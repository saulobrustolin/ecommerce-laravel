import { usePage } from "@inertiajs/react";
import Title from "./ui/title";
import { ImagesProps, ProductProps, SharedData } from "@/types";
import { toast } from "sonner";
import { SetStateAction, useEffect, useState } from "react";
import { LoaderCircle, ShoppingBasket, TrashIcon, X } from "lucide-react";

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

    useEffect(() => {
        getCart();
    }, []);
    useEffect(() => {
        console.log(products, loading)
    }, [products])

    return (
        <div
            className="fixed right-0 top-0 w-screen grid md:grid-cols-2 xl:grid-cols-[1fr_30%] grid-cols-1 items-end"
        >
            <span
                className="md:block hidden backdrop-blur-xs w-full h-full"
                onClick={() => setOpenCart(prev => !prev)}
            />
            <div
                className="w-full bg-white p-8 h-screen flex flex-col gap-6 z-10"
            >
                <div
                    className="flex justify-between items-center mb-8"
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
                                        products.map((product: ProductProps) => {
                                            return (
                                                <a
                                                    key={product.id}
                                                    href={product.url ? product.url : '#'}
                                                    className="text-black/75 p-2 py-4 flex flex-col gap-4"
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
                                                    <span
                                                        className="text-black/75 font-semibold flex flex-col gap-0.5"
                                                    >
                                                        {product.name}
                                                        <span
                                                            className="text-xs font-light line-clamp-1"
                                                        >
                                                            {product.short_description}
                                                        </span>
                                                    </span>
                                                    <div
                                                        className="flex justify-between items-center"
                                                    >
                                                        {
                                                            product.price % Math.floor(product.price) !== 0 ? (
                                                                <span>
                                                                    R${product.price.toString().replace('.', ',')}
                                                                </span>
                                                            ) : (
                                                                <span>
                                                                    R${product.price},00
                                                                </span>
                                                            )
                                                        }
                                                        <TrashIcon
                                                            className="size-4.5 cursor-pointer scale-100 hover:scale-110 transition-all"
                                                        />
                                                    </div>
                                                </a>
                                            )
                                        })
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
        </div>
    )
}