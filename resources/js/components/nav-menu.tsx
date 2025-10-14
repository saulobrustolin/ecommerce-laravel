import { usePage } from "@inertiajs/react";
import { useEffect, useState } from "react";

import { SharedData } from "@/types";

import Link from "./ui/link";
import NavLink from "./ui/nav-link";
import Cart from "./cart";

type NavMenuProps = {
    sticky?: boolean
}

function NavMenu({ sticky = false }: NavMenuProps) {
    const { auth } = usePage<SharedData>().props;

    const [scrollY, setScrollY] = useState<number>(window.scrollY);
    const [width, setWidth] = useState<number>(window.innerWidth);

    const [openCart, setOpenCart] = useState<boolean>(false);

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
    useEffect(() => {
        const body = document.body.classList
        if (openCart) {
            const exists = body.contains('overflow-y-scroll');
            exists ? body.replace('overflow-y-scroll', 'overflow-y-hidden') : body.add('overflow-y-hidden');
        } else {
            const exists = body.contains('overflow-y-hidden');
            exists ? body.replace('overflow-y-hidden', 'overflow-y-scroll') : body.add('overflow-y-scroll');
        }
    }, [openCart])

    return (
        <div
            className={`grid grid-cols-[1fr_1fr_1fr] items-center justify-between transition-all p-4 px-12 top-0 w-full z-50 ${sticky ? 'sticky bg-[#222]' : 'fixed'}`}
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
                                className={`border-b-1 w-6 h-0.5 ${sticky ? 'bg-white' : 'bg-stone-800'}`}
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
                                href="/search"
                                className={`${sticky ? 'text-white' : 'text-stone-800'} uppercase font-bold text-sm hover:underline underline-offset-2 decoration-2 cursor-pointer`}
                            >
                                search
                            </Link>
                        </>
                    ) : null
                }
                <span
                    className={`${sticky ? 'text-white' : 'text-stone-800'} uppercase font-bold text-sm hover:underline underline-offset-2 decoration-2 cursor-pointer`}
                    onClick={() => setOpenCart(prev => !prev)}
                >
                    bolsa
                </span>
            </NavLink>
            {
                openCart ? (
                    <Cart setOpenCart={setOpenCart} />
                ) : null
            }
        </div>
    )
}

export default NavMenu;