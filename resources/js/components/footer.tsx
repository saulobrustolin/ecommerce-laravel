import ColumnPages from "./column-pages"
import Newsletter from "./newsletter"
import FooterSocialMedia from "./ui/footer-social-media"

export default function Footer() {
    return (
        <footer
            className="pt-16 pb-4 px-8 flex flex-col gap-8"
        >
            <div
                className="grid grid-cols-1 lg:grid-cols-[30%_70%] divide-y md:divide-none gap-8 lg:justify-items-center"
            >
                <Newsletter/>
                <ColumnPages/>
            </div>
            <FooterSocialMedia />
        </footer>
    )
}