import { usePage } from "@inertiajs/react";
import { useEffect, useState } from "react";

import { SharedData } from "@/types";

import Link from "./ui/link";
import NavLink from "./ui/nav-link";

type NavMenuProps = {
    sticky?: boolean
}

function NavMenu({ sticky = false }: NavMenuProps) {
    const { auth } = usePage<SharedData>().props;

    const [scrollY, setScrollY] = useState<number>(window.scrollY);
    const [width, setWidth] = useState<number>(window.innerWidth);

    const [openMenu, setOpenMenu] = useState<boolean>(false);

    useEffect(() => {
        function handleScroll() {
            setScrollY(window.scrollY)
        }

        window.addEventListener('scroll', handleScroll);
    }, [])
    useEffect(() => {
        function handleResize() {
            setWidth(window.innerWidth)
        }

        window.addEventListener('resize', handleResize);
    }, [document.body.clientWidth])

    return (
        <div
            className={`grid grid-cols-[1fr_1fr_1fr] items-center justify-between p-4 px-12 top-0 w-full z-50 ${sticky ? 'sticky bg-[#222]' : 'fixed'}`}
        >
            <NavLink>
                {
                    width > 1280 ? (
                        <div
                            className="flex gap-4 justify-center items-center"
                        >
                            <Link
                                href='/bestsellers'
                                className={sticky ? "text-white" : 'text-stone-800'}
                            >
                                bestsellers
                            </Link>
                            <Link
                                href='/news'
                                className={sticky ? "text-white" : 'text-stone-800'}
                            >
                                new in
                            </Link>

                            <span
                                className={`border-b-1 w-6 h-0.5 ${sticky ? 'bg-white': 'bg-stone-800'}`}
                            />
                        </div>
                    ) : (
                        openMenu ? (
                            <span
                                className="text-stone-800 uppercase font-black text-sm cursor-default"
                                onClick={() => setOpenMenu(prev => !prev)}
                            >
                                close
                            </span>
                        ) : (
                            <span
                                className={`uppercase font-black text-sm cursor-default ${sticky ? 'text-white' : 'text-stone-800'}`}
                                onClick={() => setOpenMenu(prev => !prev)}
                            >
                                menu
                            </span>
                        )
                    )
                }

            </NavLink>

            <a href="/" className="flex items-center justify-center">
                <img 
                    src={sticky ? '/logo-white.svg' : '/logo-black.svg'} alt="logo da marca"
                    className="h-6 text-center"
                />
            </a>

            <NavLink
                className="justify-end"
            >
                {
                    width > 1280 ? (
                        <>
                            {
                                auth.user ? (
                                    <Link
                                        href="/profile"
                                        className={sticky ? 'text-white' : 'text-stone-800'}
                                    >
                                        minha conta
                                    </Link>
                                ) : (
                                    <Link
                                        href='/login'
                                        className={sticky ? 'text-white' : 'text-stone-800'}
                                    >
                                        login
                                    </Link>
                                )
                            }
                            <Link
                                href='/search'
                                className={sticky ? 'text-white' : 'text-stone-800'}
                            >
                                search
                            </Link>
                        </>
                    ) : null
                }
                <Link
                    href='/cart'
                    className="text-stone-800"
                >
                    bolsa
                </Link>
            </NavLink>
        </div>
    )
}

export default NavMenu;