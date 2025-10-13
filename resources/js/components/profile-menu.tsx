import { logout } from "@/routes";
import { LogOut, PackageIcon, UserRound } from "lucide-react";

type MenuProfileProps = {
    className?: string
}

type LinkProps = {
    name: string,
    href: string,
    icon: React.ReactNode
}

export default function MenuProfile({ className }: MenuProfileProps) {
    const url = window.location.pathname;

    const links: LinkProps[] = [
        {
            name: "Meus dados",
            href: "/profile",
            icon: (<UserRound />),
        },
        {
            name: "Meus pedidos",
            href: "/profile/pedidos",
            icon: (<PackageIcon/>),
        },
    ];

    const handleLogout = async () => {
        await fetch('http://localhost:8000/logout', { method: 'POST' });
    }
    
    return (
        <div
            className={`${className ? className : ''} flex flex-col justify-center`}
        >
            <ul
                className="divide-y border rounded-lg min-w-[250px] w-full"
            >
                {
                    links ? (
                        links.map((value: LinkProps, index: number) => {
                            return (
                                <a
                                    className={`flex gap-4 items-center justify-start p-4 rounded font-bold hover:bg-white/5 ${url == value.href ? 'bg-white/5' : ''}`}
                                    href={value.href}
                                    key={`${value}-${index}`}
                                >
                                    {value.icon}
                                    {value.name}
                                </a>
                            )
                        })
                    ) : null
                }
                <li
                    onClick={() => logout()}
                    className="flex gap-4 p-4 font-bold cursor-pointer hover:text-red-500"
                >
                    <LogOut />
                    Sair da conta
                </li>
            </ul>
        </div>
    )
}