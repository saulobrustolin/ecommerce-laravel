import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import ProfileLayout from "@/layouts/profile-layout";
import { AddressProps, OrderProps, ProductOrderProps, SharedData } from "@/types";
import { usePage } from "@inertiajs/react";
import axios from "axios";
import { MoveLeft, Plus, SquarePen } from "lucide-react";
import { FormEvent, useEffect, useState } from "react";
import { toast, Toaster } from "sonner";
import Swal from 'sweetalert2'

export default function Pedidos() {
    const { auth } = usePage<SharedData>().props;

    const [orders, setOrders] = useState<OrderProps[] | null>(null);
    const [order, setOrder] = useState<OrderProps | null>(null);

    const [address, setAddress] = useState<AddressProps[]>([]);
    const [addressSelected, setAddressSelected] = useState<AddressProps | null>(null);

    const [loading, setLoading] = useState<boolean>(true);
    
    const [changeAddress, setChangeAddress] = useState<boolean>(false);

    const getOrders = async () => {
        setLoading(true);
        await axios.get(`/api/order/${auth.user.id}`)
            .then(r => setOrders(r.data))
            .catch(() => toast.error('Algo de errado aconteceu durante a tentativa de recuperar seus pedidos. Tente novamente mais tarde...'))
            .finally(() => setLoading(false))
    }

    const getAddress = async () => {
        await axios.get(`/api/address/?user=${auth.user.id}`)
            .then(r => {
                setAddress(r.data);
            })
    }

    useEffect(() => {
        getOrders();
        getAddress();
    }, [])

    const handleCancelOrder = async () => {
        if (!order) return

        setLoading(true);
        await axios.delete(`/api/order/${order.id}`)
            .then(() => {
                setOrder(null);
                getOrders();
                toast.success('Pedido cancelado com sucesso!');
            })
            .catch(r => toast.error(r.response.data.erro))
    }

    const handleChangeAddress = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        if (!addressSelected) return toast.error('É necessário selecionar um endereço antes de fazer a alteração.');

        await axios.patch(`/api/order/${order?.id}`, { address_id: addressSelected?.id })
            .then(() => {
                toast.success('Endereço alterado com sucesso.');
                setOrder(prev => prev ? { ...prev, address: addressSelected } : null)
                setChangeAddress(false);
            })
            .catch(() => toast.error('Algo de errado aconteceu durante a tentativa de alterar o endereço.'));
    }

    if (loading) {
        return (
            <div className="bg-neutral-900 flex items-center justify-center w-screen h-screen">
                <img src="/loader.svg" alt="imagem de carregamento" width={50} height={50} />
            </div>
        )
    }

    if (changeAddress) {
        return (
            <ProfileLayout>
                <div className="space-y-2">
                    <h1 className="text-xl">Endereços</h1>
                    <form className="space-y-4" onSubmit={handleChangeAddress}>
                        <div className="border divide-y rounded">
                            {address && address.map((v: AddressProps, i: number) => {
                                return (
                                    <div key={`${v.id}-${i}`} className="grid grid-cols-[auto_90%] p-2 min-h-20">
                                        <Input type="radio" name="address" id={`address_${i}`} className="w-4 self-center justify-self-center" checked={v.id === addressSelected?.id} onChange={() => setAddressSelected(v)} />
                                        <label htmlFor={`address_${i}`}>
                                            <p>{v.label}</p>
                                            <p className="text-sm opacity-75">{v.street}, {v.number}</p>
                                            <p className="text-sm opacity-75">{v.city}, {v.zipcode}</p>
                                            {v.obs ? (<p>Obs.: {v.obs}</p>) : null}
                                        </label>
                                    </div>
                                )
                            })}
                            <div className="grid grid-cols-[auto_90%] p-2 cursor-pointer h-20 items-center" onClick={() => window.location.href = '/profile'}>
                                <span className="w-4 self-center justify-self-center cursor-pointer -translate-x-1/4">
                                    <Plus />
                                </span>
                                <label className="cursor-pointer">
                                    Adicionar novo endereço
                                </label>
                            </div>
                        </div>
                        <div className="flex justify-between">
                            <Button className="justify-self-end cursor-pointer">
                                Salvar
                            </Button>
                            <Button className="justify-self-end cursor-pointer" variant="outline" onClick={() => {
                                setChangeAddress(false);
                            }}>
                                Voltar
                            </Button>
                        </div>
                    </form>
                </div>
            </ProfileLayout>
        )
    }

    if (order) {
        console.log(order)
        return (
            <ProfileLayout>
                <div className="flex justify-between">
                    <button onClick={() => setOrder(null)} className="cursor-pointer text-white flex gap-4">
                        <MoveLeft />
                        <p>
                            Ver todos os pedidos
                        </p>
                    </button>
                    <h1 className="opacity-75">
                        Nº do pedido: {order.order_code}
                    </h1>
                </div>
                <div className="space-y-2">
                    {order.tracking_code === null && order.status !== 'Cancelado' ? (
                        <button className="cursor-pointer bg-neutral-100 rounded text-neutral-900 p-1.5 px-4 flex gap-2 items-center justify-center" onClick={() => setChangeAddress(true)}>
                            <SquarePen size={18} />
                            Alterar endereço
                        </button>
                    ) : null}
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <span>
                            <p>Pedido criado em:</p>
                            <p className="opacity-75">{new Date(order.created_at).toLocaleString('pt-BR')}</p>
                        </span>
                        {order.cupom_code ? (
                            <span>
                                <p>Cupom de desconto utilizado na compra:</p>
                                <p className="opacity-75">{order.cupom_code}</p>
                            </span>
                        ) : null}
                        {order.discount_amount ? (
                            <span>
                                <p>Desconto total:</p>
                                <p className="opacity-75">{order.discount_amount}%</p>
                            </span>
                        ) : null}
                        {order.payment_method ? (
                            <span>
                                <p>Método de pagamento:</p>
                                <p className="opacity-75">{order.payment_method}</p>
                            </span>
                        ) : null}
                        {order.shipping_method ? (
                            <span>
                                <p>Método de envio:</p>
                                <p className="opacity-75">{order.shipping_method}</p>
                            </span>
                        ) : null}
                        {order.status ? (
                            <span>
                                <p>Status do pedido:</p>
                                <p className="opacity-75">{order.status}</p>
                            </span>
                        ) : null}
                        {order.total_price ? (
                            <span>
                                <p>Valor total do pedido:</p>
                                <p className="opacity-75">R$ {Number(order.total_price).toFixed(2).replace('.', ',')}</p>
                            </span>
                        ) : null}
                        <span>
                            <p>Código de rastreamento:</p>
                            <p className="opacity-75">{order.tracking_code ?? '(sem código até o momento)'}</p>
                        </span>
                        <span>
                            <p>Custo de envio:</p>
                            <p className="opacity-75">R$ {Number(order.shipping_cost).toFixed(2).replace('.', ',') ?? 'Envio grátis'}</p>
                        </span>
                        <span>
                            <p>Endereço:</p>
                            <p className="opacity-75">{order.address.street}, {order.address.number} | {order.address.city}, {order.address.state}</p>
                        </span>
                    </div>
                    <div className="space-y-2">
                        <div>
                            <h1 className="text-md font-semibold">Produtos:</h1>
                        </div>
                        {order.product && order.product.map((v: ProductOrderProps, i: number) => {
                            return (
                                <div key={`${v.id}-${i}`}>
                                    <div className="flex gap-4">
                                        <img src={v.image[0].url} alt={`imagem do produto ${i}`} width={50} className="w-28 h-28 object-cover" />
                                        <div className="flex gap-4 w-full justify-between">
                                            <div className="space-y-1">
                                                <div>
                                                    <h1>{v.name}</h1>
                                                    <p className="text-sm opacity-75">{v.short_description}</p>
                                                </div>
                                                <div>
                                                    <p className="text-sm opacity-90">Cor: {v.pivot.color.name}</p>
                                                    <p className="text-sm opacity-90">Tamanho: {v.pivot.size.name}</p>
                                                    <p className="text-sm opacity-90">Quantidade: {v.pivot.quantity}</p>
                                                </div>
                                            </div>
                                            <div className="flex flex-col self-start items-end">
                                                <span className="opacity-75 text-sm">Total:</span>
                                                <span>{`R$ ${Number(v.pivot.subtotal).toFixed(2).replace('.', ',')}`}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            )
                        })}
                    </div>
                </div>
                {order.status !== 'Cancelado' ? (
                    <div className="self-end">
                        <button className="text-red-500 hover:text-red-700 cursor-pointer" onClick={() => {
                            Swal.fire({
                                title: 'Deseja mesmo cancelar o pedido?',
                                text: 'Se o pedido for cancelado, todos os descontos e cupons utilizados serão perdidos e não poderão ser recuperados.',
                                showCancelButton: true,
                                showConfirmButton: true,
                                icon: 'warning',
                                iconColor: 'orange',
                                confirmButtonText: 'Enviar solicitação',
                                confirmButtonColor: 'black',
                                cancelButtonText: 'Cancelar',
                                cancelButtonColor: 'red',
                                footer: '<p>Ação não reversível.</p>'
                            })
                                .then((response) => {
                                    if (response.isConfirmed) return handleCancelOrder();
                                })
                        }}>
                            Cancelar pedido
                        </button>
                    </div>
                ) : null}
            </ProfileLayout>
        )
    }

    return (
        <ProfileLayout>
            <div
                className="grid grid-cols-1 divide-y"
            >
                {
                    orders && orders.length > 0 ? (
                        orders.map((v: OrderProps, i: number) => {
                            return (
                                <div key={`${v.id}-${i}`} className="p-2 py-4 hover:bg-neutral-50/20 cursor-pointer" onClick={() => {
                                    setOrder(v);
                                    setAddressSelected(v.address);
                                }}>
                                    <div className="grid grid-cols-[50%_auto_auto_auto]">
                                        <div className="gap grid-cols-2 gap-4">
                                            <h2 className="opacity-75 text-sm">Nº {v.order_code}</h2>
                                            <h1>{v.product[0].name}
                                                {v.product.length > 1 ? <span className="text-xs opacity-50">{` +${v.product.length - 1} itens`}</span> : ''}
                                            </h1>
                                        </div>
                                        <h3 className="justify-self-start self-center text-sm">{v.payment_method}</h3>
                                        <h3 className="self-center opacity-75 text-sm">{v.status}</h3>
                                        <div className="self-center">
                                            <h3 className="justify-self-end self-center font-bold">
                                                {`R$ ${String(v.total_price).replace('.', ',')}`}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            )
                        })
                    ) : (
                        <div className="font-bold text-xl">
                            <h1>Sem pedidos criados no momento. :L</h1>
                        </div>
                    )
                }
            </div>
        </ProfileLayout>
    )
}