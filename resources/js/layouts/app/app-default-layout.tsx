import Footer from "@/components/footer";
import NavMenu from "@/components/nav-menu";

type AppDefaultLayoutProps = {
    children: React.ReactNode
}

export default function AppDefaultLayout({ children }: AppDefaultLayoutProps) {
    return (
        <>
            <NavMenu/>
            {children}
            <Footer/>
        </>
    )
}