import { ChangeEvent, useState } from "react";

export default function PickerCity() {
    const [cep, setCep] = useState<string>('');

    const handleChange = (event: ChangeEvent<HTMLInputElement>) => {
        let value = event.currentTarget.value;
        console.log(value)
        console.log(typeof value)

        if (value.length == 8) return

        setCep(value);
    }

    return (
        <div
            className="flex flex-col gap-2 w-full"
        >
            <span
                className="text-xs text-black/50 font-semibold"
            >
                Entrega
            </span>
            <input
                type="number"
                placeholder="Digite seu CEP"
                className="border-b p-2 text-lg focus:outline-0"
                onChange={handleChange}
            />
        </div>
    )
}