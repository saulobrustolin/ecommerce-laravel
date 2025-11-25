import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import CheckoutLayout from "@/layouts/checkout-layout";
import { AddressProps, SharedData } from "@/types";
import { usePage } from "@inertiajs/react";
import axios from "axios";
import { Plus } from "lucide-react";
import { FormEvent, useEffect, useState } from "react";
import { toast } from "sonner";

export default function Checkout() {
    const { auth } = usePage<SharedData>().props;

    const [address, setAddress] = useState<AddressProps[] | null>([]);
    const [selected, setSelected] = useState<AddressProps | null>(null);

    const [loading, setLoading] = useState<boolean>(true);

    const getAddresses = async () => {
        setLoading(true);
        await axios.get(`/api/address/?user=${auth.user.id}`)
            .then(r => {
                console.log(r.data);
                setAddress(r.data);
                setSelected(r.data[0]);
            })
            .catch(() => toast.error('Não foi possível recuperar os dados de endereço.'))
            .finally(() => setLoading(false));
    }

    useEffect(() => {
        if (!auth.user) {
            window.location.href = '/login';
            return
        };

        getAddresses();
    }, [])

    const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        const formData = new FormData(e.currentTarget);
        const data = Object.fromEntries(formData.entries());
        if (!data.number) data.number = 'S/N';

        setLoading(true);
        await axios.post(`/api/address/`, { ...data, user_id: auth.user.id })
            .then(() => {
                toast.success('Endereço cadastrado com sucesso!');
                getAddresses();
            })
            .catch(() => toast.error('Algo de errado aconteceu durante a tentativa de registrar um novo endereço.'))
            .finally(() => setLoading(false))
    }

    const handleContinue = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        if (!selected) {
            toast.error('É necessário selecionar um endereço para continuar.');
            return
        }

        setLoading(true);
        await axios.post('/api/order/', {
            user: auth.user.id,
            address: selected.id
        })
            .then(() => {
                toast.success('Pedido criado com sucesso.');
                localStorage.removeItem('cart');
                window.location.href = '/profile/pedidos';
            })
            .catch(err => {
                console.log(err)
                toast.error('Algo de errado aconteceu durante a tentativa de criar o pedido.');
            })
            .finally(() => setLoading(false));
    }

    if (loading) {
        return (
            <div className="bg-neutral-900 flex items-center justify-center w-screen h-screen">
                <img src="/loader.svg" alt="imagem de carregamento" width={50} height={50} />
            </div>
        )
    }

    if (address == null) {
        return (
            <CheckoutLayout>
                <form className="space-y-2" onSubmit={handleSubmit}>
                    <div>
                        <Label>Etiqueta</Label>
                        <Input placeholder="Minha casa" name="label" required />
                    </div>
                    <div>
                        <Label>Cidade</Label>
                        <Input pattern="[a-zA-Z]{5,}" placeholder="São Paulo" name="city" required />
                    </div>
                    <div>
                        <Label>Número</Label>
                        <Input pattern='[0-9]' placeholder="S/N" name="number" />
                    </div>
                    <div>
                        <Label>CEP</Label>
                        <Input pattern="\d{5}-\d{3}" placeholder="99900-000" name="zipcode" required />
                    </div>
                    <div>
                        <Label>Rua</Label>
                        <Input placeholder="Rua A" name="street" required />
                    </div>
                    <div>
                        <Label>Estado</Label>
                        <Input pattern="[A-Z]{2}" placeholder="PB" name="state" required />
                    </div>
                    <div>
                        <Label>Observações</Label>
                        <Textarea name="obs" id="obs" placeholder="Alguma informação complementar para o entregador." />
                    </div>
                    <div className="flex justify-between">
                        <Button>
                            Cadastrar endereço
                        </Button>
                        <Button variant="outline" className="cursor-pointer" onClick={() => getAddresses()}>
                            Cancelar
                        </Button>
                    </div>
                </form>
            </CheckoutLayout>
        )
    }

    return (
        <CheckoutLayout>
            <div className="space-y-2">
                <h1 className="text-xl">Endereços</h1>
                <form className="space-y-4" onSubmit={handleContinue}>
                    <div className="border divide-y rounded">
                        {address && address.map((v: AddressProps, i: number) => {
                            return (
                                <div key={`${v.id}-${i}`} className="grid grid-cols-[auto_90%] p-2 min-h-20">
                                    <Input type="radio" name="address" id={`address_${i}`} className="w-4 self-center justify-self-center" checked={v.id === selected?.id} onChange={() => setSelected(v)} />
                                    <label htmlFor={`address_${i}`}>
                                        <p>{v.label}</p>
                                        <p className="text-sm opacity-75">{v.street}, {v.number}</p>
                                        <p className="text-sm opacity-75">{v.city}, {v.zipcode}</p>
                                        {v.obs ? (<p>Obs.: {v.obs}</p>) : null}
                                    </label>
                                </div>
                            )
                        })}
                        <div className="grid grid-cols-[auto_90%] p-2 cursor-pointer h-20 items-center" onClick={() => setAddress(null)}>
                            <span className="w-4 self-center justify-self-center cursor-pointer -translate-x-1/4">
                                <Plus />
                            </span>
                            <label className="cursor-pointer">
                                Adicionar novo endereço
                            </label>
                        </div>
                    </div>
                    <Button className="justify-self-end cursor-pointer">
                        Continuar
                    </Button>
                </form>
            </div>
        </CheckoutLayout>
    )
}