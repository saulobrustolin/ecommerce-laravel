import PickerCity from "@/components/picker-city";
import PickerPrice from "@/components/picker-price";
import AppLayout from "@/layouts/app-layout";
import { ProductProps, SlugProps } from "@/types";
import { LoaderCircle, Star } from "lucide-react";
import { useEffect, useState } from "react";

type ImagesProps = {
    created_at: string,
    id: number,
    product_id: number,
    updated_at: string,
    url: string
}

type ReviewProps = {
    id: number,
    describe: string,
    star: number
}

type ProductProp = {
    data: ProductProps,
    images: ImagesProps[],
    reviews: ReviewProps[],
    star: number
}

export default function Product({ id }: { id: string }) {
    const [product, setProduct] = useState<ProductProp | null>(null);

    const [slug, setSlug] = useState<string>('');
    const [tamanho, setTamanho] = useState<string>('');
    const [quantity, setQuantity] = useState<number>(1);

    useEffect(() => {
        const getProduct = async () => {
            await fetch('/api/product/' + id)
                .then(async (response) => {
                    const json: ProductProp = await response.json();
                    setProduct(json);
                    setSlug(json.data.slugs[0].name);

                    const size = json.data.slugs.filter((value: SlugProps) => value.color == null)[0]
                    setTamanho(size.name)
                })
                .catch((error) => {
                    console.log(error)
                });
        }
        getProduct();
    }, [])

    if (!product) {
        return (
            <div
                className="w-screen h-screen bg-neutral-950 flex items-center justify-center"
            >
                <img src="/loader.svg" alt="loader" className="animate-spin size-12" />
            </div>
        )
    }

    return (
        <AppLayout
            className="bg-white min-h-screen"
        >
            <div
                className="pt-14 flex flex-col justify-center items-center"
            >
                <div
                    className="text-black grid grid-cols-1 lg:grid-cols-[1fr_30%] gap-8 md:p-8"
                >
                    <div
                        className="grid grid-cols-1 md:grid-cols-2 md:gap-2"
                    >
                        {
                            product.images.map((image: ImagesProps, index: number) => {
                                return (
                                    <img key={`${image.id}-${index}`} src={image.url} alt={`imagem do produto ${index}`} className="lg:max-h-[1000px]" />
                                )
                            })
                        }
                    </div>
                    <div>
                        <div
                            className="lg:relative p-2 flex flex-col gap-4"
                        >
                            <div
                                className="flex flex-col gap-2"
                            >
                                <span className="lg:relative text-lg font-semibold uppercase">
                                    {product.data.name}
                                </span>
                                {
                                    product.star !== 0 ? (
                                        <div
                                            className="flex items-center justify-start text-sm gap-1"
                                        >
                                            <span
                                                className="text-md"
                                            >
                                                {product.star}
                                            </span>
                                            <Star className="fill-black size-3" />
                                            <span
                                                className="text-xs underline underline-offset-1"
                                            >
                                                ({product.reviews.length})
                                            </span>
                                        </div>
                                    ) : null
                                }
                            </div>
                            <div
                                className="flex flex-col gap-1"
                            >
                                <span
                                    className="font-semibold"
                                >
                                    R$ {product.data.price.toString().replace('.', ',')}
                                </span>
                                <span
                                    className="text-black/50 text-xs"
                                >
                                    1x R$ ${product.data.price} sem juros
                                </span>
                            </div>
                            <div
                                className="flex flex-col gap-2"
                            >
                                <span
                                    className="text-xs text-black/50 font-semibold"
                                >
                                    {slug} | {product.data.id.toString().padStart(8, '0')}
                                </span>
                                <div
                                    className="flex gap-2"
                                >
                                    {
                                        product.data.slugs.map((slugItem: SlugProps) => {
                                            if (slugItem.color !== null) {
                                                return (
                                                    <div
                                                        className={`w-8 h-8 rounded-full p-0.75 cursor-pointer scale-100 hover:scale-[101%] ${slug == slugItem.name ? 'border' : ''}`}
                                                        onClick={() => setSlug(slugItem.name)}
                                                        key={slugItem.id}
                                                    >
                                                        <span
                                                            className={`rounded-full border w-full h-full block `}
                                                            style={{ backgroundColor: slugItem.color }}
                                                        />
                                                    </div>
                                                )
                                            }
                                        })
                                    }
                                </div>
                            </div>

                            <div
                                className="flex flex-col gap-2"
                            >
                                <span
                                    className="text-xs text-black/50 font-semibold"
                                >
                                    Tamanho
                                </span>
                                <div
                                    className="flex gap-2"
                                >
                                    {
                                        product.data.slugs.map((slugItem: SlugProps, index: number) => {
                                            if (slugItem.color == null) {
                                                return (
                                                    <span
                                                        key={`${slugItem.id}-${index}`}
                                                        className={`border w-12 h-8 flex items-center justify-center text-xs cursor-pointer scale-100 hover:scale-[101%] ${slugItem.name == tamanho ? 'bg-black text-white' : 'bg-white text-black'}`}
                                                        onClick={() => setTamanho(slugItem.name)}
                                                    >
                                                        {slugItem.name}
                                                    </span>
                                                )
                                            }
                                        })
                                    }
                                </div>
                            </div>
                            <div
                                className="flex flex-col gap-2"
                            >
                                <span
                                    className="text-xs text-black/50 font-semibold"
                                >
                                    Quantidade
                                </span>
                                <div
                                    className="flex gap-2"
                                >
                                    <PickerPrice
                                        quantity={quantity}
                                        onIncrease={() => {
                                            setQuantity(prev => prev + 1);
                                        }}
                                        onDecrease={() => {
                                            if (quantity == 1) return
                                            setQuantity(prev => prev - 1);
                                        }}
                                        className='h-fit'
                                    />

                                    <button
                                        className="bg-black text-white w-full"
                                    >
                                        Adicionar a sacola
                                    </button>
                                </div>
                            </div>

                            <div
                                className="flex flex-col gap-2"
                            >
                                <PickerCity />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}