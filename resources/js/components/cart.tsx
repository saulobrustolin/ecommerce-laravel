import { usePage } from "@inertiajs/react";
import Title from "./ui/title";
import { CartProps, SharedData } from "@/types";
import { ChangeEvent, SetStateAction, useEffect, useState } from "react";
import { LoaderCircle, ShoppingBasket, TrashIcon, X } from "lucide-react";
import { Input } from "./ui/input";
import { Label } from "./ui/label";
import { Button } from "./ui/button";
import { toast } from "sonner";
import axios from "axios";

type CartOpenProps = {
    setOpenCart: React.Dispatch<SetStateAction<boolean>>
}

export default function Cart({ setOpenCart }: CartOpenProps) {
    const { auth } = usePage<SharedData>().props;

    const [cart, setCart] = useState<CartProps[]>([]);
    const [loading, setLoading] = useState<boolean>(false);

    const getCart = async () => {
        if (!auth.user) return

        await axios.get(`/api/cart/${auth.user.id}`)
            .then(r => {
                localStorage.setItem('cart', JSON.stringify(r.data));
                setCart(r.data);
            })
    }

    const handleCart = async () => {
        setLoading(prev => !prev);
        const local: string | null = localStorage.getItem('cart');
        if (local) {
            const carts = JSON.parse(local);
            setCart(carts);
            setLoading(prev => !prev);
            return
        }
        setCart([]);
        setLoading(prev => !prev);
    }

    const handleDeleteProduct = async (id: number) => {
        if (!cart) return

        const filter = cart.filter((c: CartProps) => c.id !== id);
        setCart(filter);
        localStorage.setItem('cart', JSON.stringify(filter));

        await axios.delete(`/api/cart/${id}`)
            .then(r => toast.success(r.data.mensagem))
            .catch(() => toast.error("Não foi possível remover o item do carrinho, tente novamente..."))
    }

    const handleBlurQuantidade = async (e: ChangeEvent<HTMLInputElement>, id: number) => {
        const value = +e.target.value;

        await axios.patch(`/api/cart/${id}`, {
            quantity: value
        })
            .catch(() => toast.error("Não foi possível alterar a quantidade de produtos no banco de dados."))
    }

    const handleFinishCart = async () => {
        if (!auth.user) return window.location.href = '/login';

        await axios.post('/api/order', { user: auth.user.id })
            .then(() => {
                localStorage.removeItem('cart');
                window.location.href = '/profile/pedidos';
            })
            .catch(er => console.error(er.response));
    }

    useEffect(() => {
        handleCart();
        getCart();
    }, []);

    useEffect(() => {
        if (cart.length > 0) return localStorage.setItem('cart', JSON.stringify(cart));
    }, [cart])

    return (
        <div
            className="fixed right-0 top-0 w-screen max-h-screen grid md:grid-cols-2 xl:grid-cols-[1fr_30%] grid-cols-1 items-end"
        >
            <span
                className="md:block hidden backdrop-blur-xs w-full h-full"
                onClick={() => setOpenCart(prev => !prev)}
            />
            <div
                className="w-full bg-white p-8 h-screen flex flex-col gap-6 z-10 justify-between divide-y divide-stone-300"
            >
                <div
                    className="grid grid-rows-[auto_1fr_auto] max-h-full min-h-full gap-1 p-0 m-0"
                >
                    <div
                        className="flex justify-between items-center mb-2"
                    >
                        <Title
                            className="uppercase text-black font-bold text-lg"
                        >
                            Minha sacola
                        </Title>
                        <X
                            className="size-6 cursor-pointer hover:rotate-45 transition-all text-black"
                            onClick={() => setOpenCart(prev => !prev)}
                        />
                    </div>

                    <div
                        className={`h-full overflow-y-auto relative flex flex-col ${cart.length === 0 ? "justify-center" : ""}`}
                    >
                        {
                            loading ? (
                                <LoaderCircle className="animate-spin text-black size-6" />
                            ) : (
                                <ul
                                    className="divide-y divide-stone-300"
                                >
                                    {
                                        cart && cart.length !== 0 ? (
                                            cart.map((c: CartProps, indexProduct: number) => {
                                                return (
                                                    <li
                                                        key={`${c.size_id}-${indexProduct}-${c.id}`}
                                                        className={`text-black/75 p-2 py-4 flex flex-col gap-4 ${c.quantity == 0 ? 'backdrop-blur-md' : ''}`}
                                                    >
                                                        <a
                                                            href="#"
                                                            className="text-black/75 font-semibold flex flex-col gap-0.5"
                                                        >
                                                            {c.product.name}
                                                            <span
                                                                className="text-xs font-light line-clamp-1"
                                                            >
                                                                {c.product.short_description}
                                                            </span>
                                                        </a>
                                                        <div
                                                            className="flex flex-col gap-1"
                                                        >
                                                            <Label
                                                                htmlFor={`input-quantidade-${indexProduct}`}
                                                            >
                                                                Quantidade
                                                            </Label>
                                                            <Input
                                                                id={`input-quantidade-${indexProduct}`}
                                                                data-index={indexProduct}
                                                                min={1}
                                                                value={c.quantity}
                                                                onChange={(e: ChangeEvent<HTMLInputElement>) => {
                                                                    const value = +e.target.value;

                                                                    setCart(prev =>
                                                                        prev ? prev.map(ct =>
                                                                            ct.id === c.id ? { ...ct, quantity: value } : ct
                                                                        ) : []
                                                                    );
                                                                }}
                                                                onBlur={(e: ChangeEvent<HTMLInputElement>) => handleBlurQuantidade(e, c.product.id)}
                                                                type="number"
                                                                className="w-fit border-stone-300"
                                                            />
                                                        </div>
                                                        <div
                                                            className="flex justify-between items-center"
                                                        >
                                                            {
                                                                Number(c.product.price) % Math.floor(Number(c.product.price)) !== 0 ? (
                                                                    <span
                                                                        className="flex flex-col gap-0.5"
                                                                    >
                                                                        <span
                                                                            className="text-sm text-black/50"
                                                                        >
                                                                            R${c.product.price.replace('.', ',')} x {c.quantity}
                                                                        </span>
                                                                        <span
                                                                            className="flex gap-0.5 font-semibold"
                                                                        >
                                                                            <span
                                                                                className="text-black/50 font-normal"
                                                                            >
                                                                                Total:
                                                                            </span>
                                                                            R${(Number(c.product.price) * Number(c.quantity)).toFixed(2).replace('.', ',')}
                                                                        </span>
                                                                    </span>
                                                                ) : (
                                                                    <span
                                                                        className="flex flex-col gap-0.5"
                                                                    >
                                                                        <span
                                                                            className="text-sm text-black/50"
                                                                        >
                                                                            R${c.product.price.replace('.', ',')} x {c.quantity}
                                                                        </span>
                                                                        <span
                                                                            className="flex gap-1 font-semibold"
                                                                        >
                                                                            <span
                                                                                className="text-black/50 font-normal"
                                                                            >
                                                                                Total:
                                                                            </span>
                                                                            R${Number(Number(c.product.price) * c.quantity).toFixed(2).replace('.', ',')}
                                                                        </span>
                                                                    </span>
                                                                )
                                                            }
                                                            <TrashIcon
                                                                data-id={c.id}
                                                                className="size-4.5 cursor-pointer scale-100 hover:scale-110 transition-all"
                                                                onClick={() => handleDeleteProduct(c.id)}
                                                            />
                                                        </div>
                                                    </li>
                                                )
                                            })
                                        ) : (
                                            <span
                                                className="flex flex-col gap-6 text-neutral-900 font-bold text-2xl items-center h-full justify-center uppercase"
                                            >
                                                <ShoppingBasket className="size-18" />
                                                Carrinho vazio.
                                            </span>
                                        )
                                    }
                                </ul>
                            )
                        }
                    </div>
                    <div
                        className="w-full pt-2"
                    >
                        <Button
                            className="bg-black w-full box-border hover:bg-black/90 transition-all text-white rounded-none h-14 p-4 cursor-pointer"
                            disabled={cart.length === 0}
                            onClick={handleFinishCart}
                        >
                            {loading ? (<img src="/public/loader.svg" width={20} height={20} />) : "Finalizar compra"}
                        </Button>
                    </div>
                </div>
            </div>
        </div>
    )
}