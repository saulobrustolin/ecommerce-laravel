export default function InputNewsletter() {
    return (
        <span
            className="flex max-w-full w-full"
        >
            <input
                type="email"
                className="border border-white text-white p-4 px-6 placeholder:font-black placeholder:font-lg placeholder:uppercase focus:outline-0 min-w-[80%] w-full"
                placeholder="e-mail*"
            />
            <button
                className="uppercase font-black border border-white border-l-0 p-4 px-6 cursor-pointer max-w-[20%] lg:max-w-[30%] w-full"
            >
                ok
            </button>
        </span>
    )
}