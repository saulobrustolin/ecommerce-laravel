import { ProductProps } from "@/types"
import { MouseEvent } from "react";

type ProductCollectionProps = {
    product: ProductProps;
}

export default function ProductCollection({ product }: ProductCollectionProps) {
    return (
        <a
            className="flex flex-col gap-1"
            href={`/product/${product.id}`}
        >
            <img
                src={product.image[0].url}
                className="h-[600px] object-cover"
                height={500}
                onMouseOver={(element: MouseEvent<HTMLImageElement>) => element.currentTarget.src = product.image[1].url}
                onMouseOut={(element: MouseEvent<HTMLImageElement>) => element.currentTarget.src = product.image[0].url}
            />
            <div
                className="flex flex-col gap-0.5"
            >
                <span
                    className="font-semibold line-clamp-1 text-sm text-stone-800"
                >
                    {product.name}
                </span>
                {
                    Number(product.price) % Math.floor(Number(product.price)) == 0 ? (
                        <span
                            className="text-stone-800/75 text-xs"
                        >
                            R${product.price.replace('.', ',')}
                        </span>
                    ) : (
                        <span
                            className="text-stone-800/75 text-xs"
                        >
                            R${Number(product.price).toFixed(2).replace('.', ',')}
                        </span>
                    )
                }
            </div>
        </a>
    )
}