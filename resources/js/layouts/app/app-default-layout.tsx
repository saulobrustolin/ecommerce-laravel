import Footer from "@/components/footer";
import NavMenu from "@/components/nav-menu";

type AppDefaultLayoutProps = {
    children: React.ReactNode,
    sticky?: boolean,
    className?: string,
}

export default function AppDefaultLayout({ children, sticky, className }: AppDefaultLayoutProps) {
    return (
        <>
            <NavMenu
                sticky={sticky}
            />
            <main
                className={`${className} min-h-screen`}
            >
                {children}
            </main>
            <Footer/>
        </>
    )
}