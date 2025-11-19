import NavMenuProfile from "@/components/nav-menu-profile"
import MenuProfile from "@/components/profile-menu"
import { Toaster } from "@/components/ui/sonner"

type ProfileLayoutProps = {
    children: React.ReactNode
}

export default function ProfileLayout({ children }: ProfileLayoutProps) {
    return (
        <>
            <div
                className="flex flex-col justify-center items-center"
            >
                <NavMenuProfile/>
                <div
                    className="grid grid-cols-1 lg:grid-cols-[30%_70%] lg:min-h-screen lg:max-w-[70%] p-4 w-full gap-4 items-center"
                >
                    <MenuProfile/>
                    <main
                        className="px-8 py-6 flex flex-col justify-center border border-stone-800 rounded-lg gap-4 w-full h-fit"
                    >
                        {children}
                    </main>
                </div>
            </div>
            <Toaster position='bottom-left' />
        </>
    )
}