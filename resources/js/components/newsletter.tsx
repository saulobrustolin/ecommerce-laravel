import InputNewsletter from "./ui/input-newsletter";

export default function Newsletter() {
    return (
        <div
            className="flex flex-col gap-4 pb-4"
        >
            <h3
                className="uppercase font-black text-4xl"
            >
                newsletter
            </h3>
            <InputNewsletter/>
            <span
                className="flex gap-2 justify-start items-center"
            >
                <input 
                    type="checkbox"
                    className="bg-amber-400"
                />
                <p
                    className="text-xs w-fullw"
                >
                    I have read and accept the Jean Paul Gaultier's <a href="/pages/politica-de-privacidade" className="hover:underline hover:underline-offset-2">Privacy Policy</a>.
                </p>
            </span>
        </div>
    )
}