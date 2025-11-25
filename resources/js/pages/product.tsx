import PickerCity from "@/components/picker-city";
import PickerPrice from "@/components/picker-price";
import AppLayout from "@/layouts/app-layout";
import { CartProps, ColorProps, ImageProps, ProductProps, ReviewProps, SharedData, SizeProps } from "@/types";
import { usePage } from "@inertiajs/react";
import axios from "axios";
import { Check, Star } from "lucide-react";
import { useEffect, useState } from "react";
import { toast } from "sonner";

export default function Product({ id }: { id: string }) {
    const { auth } = usePage<SharedData>().props;

    const [product, setProduct] = useState<ProductProps | null>(null);

    const [cor, setCor] = useState<number>(0);
    const [tamanho, setTamanho] = useState<number>(0);
    const [quantity, setQuantity] = useState<number>(1);

    const [success, setSuccess] = useState<boolean>(false);

    useEffect(() => {
        (async () => {
            await axios.get(`/api/product/${id}`)
                .then((r) => {
                    const data: ProductProps = r.data;
                    setProduct(data);
                    setTamanho(data.size[0].id);
                    setCor(data.color[0].id);
                })
                .catch(() => toast.error('Erro ao recuperar dados deste produto.'))
        })()
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

    const handleAddCart = () => {
        if (!auth.user) return addingCart();

        function addingCart(api: CartProps | null = null) {
            if (!product) return

            const data: CartProps = {
                id: 0,
                quantity,
                created_at: new Date().toISOString(),
                updated_at: new Date().toISOString(),
                size_id: tamanho,
                color_id: cor,
                product: {
                    id: product?.id,
                    name: product?.name,
                    available: true,
                    price: product?.price,
                    short_description: product?.short_description,
                    image: product?.image
                }
            }

            try {
                const cartLocal = localStorage.getItem('cart');
                if (!cartLocal) return localStorage.setItem('cart', JSON.stringify(api ? [api] : [data]));
    
                const cart = JSON.parse(cartLocal);
                cart.push(api ?? data);
    
                localStorage.setItem('cart', JSON.stringify(cart));

                toast.success('Sucesso ao adicionar produto no carrinho!')
            } finally {
                setSuccess(true);
                setTimeout(() => {
                    setSuccess(false)
                }, 2000);
            }
        }

        axios.post('/api/cart', {
            quantity,
            product_id: product.id,
            user_id: auth.user.id,
            size_id: tamanho,
            color_id: cor
        })
            .then(v => {
                addingCart(v.data[0])
            })
            .catch(() => toast.error("Não foi possível adicionar este produto ao carrinho."));
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
                            product.image.map((image: ImageProps, index: number) => {
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
                                    {product.name}
                                </span>
                                {
                                    product.review_avg_star && product.review_avg_star !== 0 ? (
                                        <div
                                            className="flex items-center justify-start text-sm gap-1"
                                        >
                                            <span
                                                className="text-md"
                                            >
                                                {product.review_avg_star}
                                            </span>
                                            <Star className="fill-black size-3" />
                                            <span
                                                className="text-xs underline underline-offset-1"
                                            >
                                                ({product.total_reviews})
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
                                    R$ {product.price.replace('.', ',')}
                                </span>
                                <span
                                    className="text-black/50 text-xs"
                                >
                                    1x R$ ${product.price} sem juros
                                </span>
                            </div>
                            <div
                                className="flex flex-col gap-2"
                            >
                                <span
                                    className="text-xs text-black/50 font-semibold"
                                >
                                    Cores
                                </span>
                                <div
                                    className="flex gap-2"
                                >
                                    {
                                        product.color.map((colorItem: ColorProps) => {
                                            return (
                                                <div
                                                    className={`w-8 h-8 rounded-full p-0.75 cursor-pointer scale-100 hover:scale-[101%] ${cor == colorItem.id ? 'border' : ''}`}
                                                    onClick={() => setCor(colorItem.id)}
                                                    key={colorItem.id}
                                                >
                                                    <span
                                                        className={`rounded-full border w-full h-full block `}
                                                        style={{ backgroundColor: colorItem.color }}
                                                    />
                                                </div>
                                            )
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
                                        product.size.map((sizeItem: SizeProps, index: number) => {
                                            return (
                                                <span
                                                    key={`${sizeItem.id}-${index}`}
                                                    className={`border w-12 h-8 flex items-center justify-center text-xs cursor-pointer scale-100 hover:scale-[101%] ${sizeItem.id == tamanho ? 'bg-black text-white' : 'bg-white text-black'}`}
                                                    onClick={() => setTamanho(sizeItem.id)}
                                                >
                                                    {sizeItem.name}
                                                </span>
                                            )
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
                                        className="bg-black text-white w-full cursor-pointer flex items-center justify-center"
                                        onClick={handleAddCart}
                                    >
                                        {success ? <Check /> : "Adicionar a sacola"}
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