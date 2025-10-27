import { Minus, Plus } from "lucide-react"

type PickerPriceProps = {
    quantity: number,
    onIncrease: () => void,
    onDecrease: () => void,
    className: string
}

export default function PickerPrice({ quantity, onIncrease, onDecrease, className }: PickerPriceProps) {
    return (
        <div
            className="flex flex-col gap-2 h-12"
        >
            <div
                className="p-2 flex items-center justify-center gap-1 border w-fit size-8 h-full"
            >
                <Plus className="w-4 cursor-pointer" onClick={onIncrease} />
                <span className="w-6 text-center">
                    {quantity}
                </span>
                <Minus className="w-4 cursor-pointer" onClick={onDecrease} />
            </div>
        </div>
    )
}