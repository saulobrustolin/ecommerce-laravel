import AppLayout from "@/layouts/app-layout";
import { ProductProps } from "@/types";
import { Ban, Undo2 } from "lucide-react";
import { useEffect, useState } from "react";
import { toast } from "sonner";

export default function Search() {
    const [products, setProducts] = useState<ProductProps[] | null>(null);

    const gridCols = 3;

    const handleProducts = async () => {
        const options = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        }

        const response = await fetch('/api/product', options);
        if (!response.ok) {
            toast('Não foi possível capturar os produtos no banco de dados, tente novamente mais tarde...', { icon: <Ban className="text-red-500 mr-4 size-5" /> })
            return
        }
        const json = await response.json()
        setProducts(json.data);
    }

    useEffect(() => {
        handleProducts();
    }, [])

    return (
        <AppLayout
            className="bg-white min-h-screen"
        >
            <div
                className="bg-white fixed top-0 left-0 w-screen h-screen p-8 md:py-12 md:px-10 xl:p-12 flex flex-col gap-4 mt-16"
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
                    />
                </div>
            </div>
            <ul
                className={`grid grid-cols-${gridCols} gap-2`}
            >
                {
                    products && products.length !== 0 ? (
                        products.map((product: ProductProps) => {
                            return (
                                <li
                                    key={product.id}
                                    className="text-black"
                                >
                                    {product.name}
                                </li>
                            )
                        })
                    ) : null
                }
            </ul>
        </AppLayout>
    )
}