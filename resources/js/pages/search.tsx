import ProductCollection from "@/components/product-collection";
import AppLayout from "@/layouts/app-layout";
import { ProductProps } from "@/types";
import { Ban, Undo2 } from "lucide-react";
import { ChangeEvent, useEffect, useState } from "react";
import { toast } from "sonner";

export default function Search() {
    const [products, setProducts] = useState<ProductProps[] | null>(null);
    const [search, setSearch] = useState<string>('');

    const handleProducts = async () => {
        const options = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        }

        const response = await fetch('/api/product' + (search ? `?search=${search}` : ''), options);
        if (!response.ok) {
            toast('Não foi possível capturar os produtos no banco de dados, tente novamente mais tarde...', { icon: <Ban className="text-red-500 mr-4 size-5" /> })
            return
        }
        const json = await response.json()
        if (json.data == products) return

        setProducts(json.data);
    }

    useEffect(() => {
        handleProducts();
    }, [])
    useEffect(() => {
        handleProducts();
    }, [search])

    return (
        <AppLayout
            className="bg-white min-h-screen"
        >
            <div
                className="bg-white min-w-screen min-h-screen p-8 md:py-12 md:px-10 xl:p-12 xl:pt-18 flex flex-col gap-4"
            >
                <div
                    className="flex justify-between items-center mb-8"
                >
                    <a
                        href="/"
                        className="hover:underline underline-offset-4 decoration-2 cursor-pointer text-black flex gap-2 justify-center items-center"
                    >
                        <Undo2
                            className="hover:rotate-45 text-black size-6 transition-all cursor-pointer"
                        />
                        Voltar para página inicial
                    </a>
                </div>
                <div>
                    <input
                        className="border-b border-r-0 border-t-0 p-2 border-l-0 border-b-stone-400 h-full text-4xl rounded-none w-full focus:outline-0 placeholder:text-4xl placeholder:text-stone-400 text-black"
                        placeholder="Digite o que está buscando..."
                        onChange={(event: ChangeEvent<HTMLInputElement>) => setSearch(event.target.value)}
                    />
                </div>
                <ul
                    className={`grid grid-cols-3 gap-2`}
                >
                    {
                        products && products.length !== 0 ? (
                            products.map((product: ProductProps) => {
                                console.log(product);
                                return (
                                    <ProductCollection
                                        product={product}
                                        key={product.id}
                                    />
                                )
                            })
                        ) : null
                    }
                </ul>
            </div>
        </AppLayout>
    )
}