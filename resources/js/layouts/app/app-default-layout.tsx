import Footer from "@/components/footer";
import NavMenu from "@/components/nav-menu";

type AppDefaultLayoutProps = {
    children: React.ReactNode,
    sticky?: boolean
}

export default function AppDefaultLayout({ children, sticky }: AppDefaultLayoutProps) {
    return (
        <>
            <NavMenu
                sticky={sticky}
            />
            {children}
            <Footer/>
        </>
    )
}