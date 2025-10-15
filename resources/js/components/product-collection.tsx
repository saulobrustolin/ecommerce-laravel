import { ProductProps } from "@/types"

type ProductCollectionProps = {
    product: ProductProps;
}

export default function ProductCollection({ product }: ProductCollectionProps) {
    return (
        <article
            className="flex flex-col gap-1"
        >
            <img
                src={product.images[0].url}
                className="h-[600px] object-cover"
                height={500}
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
                    product.price % Math.floor(product.price) == 0 ? (
                        <span
                            className="text-stone-800/75 text-xs"
                        >
                            R${product.price.toString() + ',00'}
                        </span>
                    ) : (
                        <span
                            className="text-stone-800/75 text-xs"
                        >
                            R${product.price.toFixed(2).replace('.', ',')}
                        </span>
                    )
                }
            </div>
        </article>
    )
}