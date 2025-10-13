import { Undo2 } from "lucide-react";

export default function NavMenuProfile() {
    return (
        <div
            className="fixed top-0 left-0 p-8 px-12 flex justify-between items-center w-full"
        >
            <a
                href="/"
                className="flex gap-2 items-center cursor-pointer text-white p-2"
            >
                <Undo2 />
                Voltar para página inicial
            </a>
            <a href="/">
                <img className="h-5" src="/logo-white.svg" alt="logo da empresa" />
            </a>
        </div>
    )
}