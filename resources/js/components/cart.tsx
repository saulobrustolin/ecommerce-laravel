import { usePage } from "@inertiajs/react";
import Title from "./ui/title";
import { ImagesProps, ProductProps, SharedData } from "@/types";
import { ChangeEvent, SetStateAction, useEffect, useState } from "react";
import { Ban, CircleCheck, LoaderCircle, ShoppingBasket, TrashIcon, X } from "lucide-react";
import { Input } from "./ui/input";
import { Label } from "./ui/label";
import { Button } from "./ui/button";
import { toast } from "sonner";

type CartProps = {
    setOpenCart: React.Dispatch<SetStateAction<boolean>>
}

export default function Cart({ setOpenCart }: CartProps) {
    const { auth } = usePage<SharedData>().props;

    const [products, setProducts] = useState<ProductProps[] | null>(null);
    const [loading, setLoading] = useState<boolean>(false);

    const getCart = async () => {
        if (!auth.user.id) return

        const options = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        };
        const carts = await fetch('/api/cart/' + auth.user.id, options);
        if (carts.ok) {
            const json = await carts.json()
            localStorage.setItem('cart', JSON.stringify(json.data));
            handleCart();
            return
        }

    }

    const handleCart = async () => {
        setLoading(prev => !prev);
        const local: string | null = localStorage.getItem('cart');
        if (local) {
            const products = JSON.parse(local);
            setProducts(products);
            setLoading(prev => !prev);
            return
        }
        setProducts([]);
        setLoading(prev => !prev);
    }

    const handleDeleteProduct = async (id: number) => {
        if (!products) return

        const filter = products.filter((product: ProductProps) => product.id !== id);
        setProducts(filter);
        localStorage.setItem('cart', JSON.stringify(filter));

        const options = {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        };

        const response = await fetch('/api/cart/' + id, options);
        if (!response.ok) {
            toast('Não foi possível remover o item do carrinho, tente novamente...', { icon: <Ban className="text-red-500 mr-4" /> })
            return
        }
        const json = await response.json();
        toast(json.mensagem, { icon: <CircleCheck className="text-lime-500 mr-4" /> });
    }

    const handleBlurQuantidade = async (e: ChangeEvent<HTMLInputElement>, id: number) => {
        const value = +e.target.value;

        const options = {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                quantity: value
            })
        }
        const response = await fetch('/api/cart/' + id, options);
        if (!response.ok) {
            toast('Não foi possível alterar a quantidade de produtos no banco de dados.', { icon: <Ban className="text-red-500 mr-4" /> });
            return
        }
    }

    useEffect(() => {
        handleCart();
        getCart();
    }, []);

    useEffect(() => {
        if (!products || products.length < 0) return

        localStorage.setItem('cart', JSON.stringify(products));
    }, [products])

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
                    className="flex flex-col gap-1 p-0 m-0"
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

                    <div>
                        {
                            loading ? (
                                <LoaderCircle className="animate-spin text-black size-6" />
                            ) : (
                                <ul
                                    className="divide-y divide-stone-300"
                                >
                                    {
                                        products !== null ? (
                                            products.length !== 0 ? (
                                                products.map((product: ProductProps, indexProduct: number) => {
                                                    return (
                                                        <li
                                                            key={product.id}
                                                            className={`text-black/75 p-2 py-4 flex flex-col gap-4 ${product.quantity == 0 ? 'backdrop-blur-md' : ''}`}
                                                        >
                                                            {
                                                                product.images ? (
                                                                    product.images.map((image: ImagesProps, index: number) => {
                                                                        return (
                                                                            <img
                                                                                src={image.url}
                                                                                alt={`Imagem do produto ${index}`}
                                                                                key={image.id}
                                                                            />
                                                                        )
                                                                    })
                                                                ) : null
                                                            }
                                                            <a
                                                                href={product.url}
                                                                className="text-black/75 font-semibold flex flex-col gap-0.5"
                                                            >
                                                                {product.name}
                                                                <span
                                                                    className="text-xs font-light line-clamp-1"
                                                                >
                                                                    {product.short_description}
                                                                </span>
                                                            </a>
                                                            <div
                                                                className="flex flex-col gap-1"
                                                            >
                                                                <Label
                                                                    htmlFor={`input-quantidade-${indexProduct}`}
                                                                >Quantidade</Label>
                                                                <Input
                                                                    id={`input-quantidade-${indexProduct}`}
                                                                    data-index={indexProduct}
                                                                    min={1}
                                                                    value={product.quantity}
                                                                    onChange={(e: ChangeEvent<HTMLInputElement>) => {
                                                                        const value = +e.target.value;

                                                                        setProducts(prev =>
                                                                            prev ? prev.map((p) =>
                                                                                p.id === product.id ? { ...p, quantity: value } : p
                                                                            ) : []
                                                                        );
                                                                    }}
                                                                    onBlur={(e: ChangeEvent<HTMLInputElement>) => handleBlurQuantidade(e, product.id)}
                                                                    type="number"
                                                                    className="w-fit border-stone-300"
                                                                />
                                                            </div>
                                                            <div
                                                                className="flex justify-between items-center"
                                                            >
                                                                {
                                                                    product.price % Math.floor(product.price) !== 0 ? (
                                                                        <span
                                                                            className="flex flex-col gap-0.5"
                                                                        >
                                                                            <span
                                                                                className="text-sm text-black/50"
                                                                            >
                                                                                R${product.price.toString().replace('.', ',')} x {product.quantity}
                                                                            </span>
                                                                            <span
                                                                                className="flex gap-0.5 font-semibold"
                                                                            >
                                                                                <span
                                                                                    className="text-black/50 font-normal"
                                                                                >
                                                                                    Total:
                                                                                </span>
                                                                                R${(product.price * product.quantity).toString().replace('.', ',')}
                                                                            </span>
                                                                        </span>
                                                                    ) : (
                                                                        <span
                                                                            className="flex flex-col gap-0.5"
                                                                        >
                                                                            <span
                                                                                className="text-sm text-black/50"
                                                                            >
                                                                                R${product.price},00 x {product.quantity}
                                                                            </span>
                                                                            <span
                                                                                className="flex gap-1 font-semibold"
                                                                            >
                                                                                <span
                                                                                    className="text-black/50 font-normal"
                                                                                >
                                                                                    Total:
                                                                                </span>
                                                                                R${product.price * product.quantity},00
                                                                            </span>
                                                                        </span>
                                                                    )
                                                                }
                                                                <TrashIcon
                                                                    data-id={product.id}
                                                                    className="size-4.5 cursor-pointer scale-100 hover:scale-110 transition-all"
                                                                    onClick={() => handleDeleteProduct(product.id)}
                                                                />
                                                            </div>
                                                        </li>
                                                    )
                                                })
                                            ) : (
                                                <span>
                                                    Sem itens até o momento :L
                                                </span>
                                            )
                                        ) : null
                                    }
                                    {
                                        products !== null && products.length == 0 ? (
                                            <span
                                                className="flex flex-col gap-6 text-lg uppercase"
                                            >
                                                <ShoppingBasket className="size-12" />
                                                Carrinho vazio.
                                            </span>
                                        ) : null
                                    }
                                </ul>
                            )
                        }
                    </div>
                </div>
                <Button
                    className="bg-black hover:bg-black/90 transition-all text-white rounded-none h-14 p-4 cursor-pointer"
                >
                    Finalizar compra
                </Button>
            </div>
        </div>
    )
}