import { usePage } from "@inertiajs/react";
import { useEffect, useState } from "react";

import { SharedData } from "@/types";

import Link from "./ui/link";
import NavLink from "./ui/nav-link";

function NavMenu() {
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
            className="grid grid-cols-[1fr_1fr_1fr] items-center justify-between p-4 px-12 fixed top-0 w-full z-50"
        >
            <NavLink>
                {
                    width > 1280 ? (
                        <div
                            className="flex gap-4 justify-center items-center"
                        >
                            <Link
                                href='/bestsellers'
                                className="text-stone-800"
                            >
                                bestsellers
                            </Link>
                            <Link
                                href='/news'
                                className="text-stone-800"
                            >
                                new in
                            </Link>

                            <span
                                className="border-b-1 bg-white w-6 h-0.5"
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
                                className="text-stone-800 uppercase font-black text-sm cursor-default"
                                onClick={() => setOpenMenu(prev => !prev)}
                            >
                                menu
                            </span>
                        )
                    )
                }

            </NavLink>

            <h1
                className="uppercase font-title text-2xl text-center text-stone-800"
            >
                hedone
            </h1>

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
                                        className="text-stone-800"
                                    >
                                        minha conta
                                    </Link>
                                ) : (
                                    <Link
                                        href='/login'
                                        className="text-stone-800"
                                    >
                                        login
                                    </Link>
                                )
                            }
                            <Link
                                href='/search'
                                className="text-stone-800"
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