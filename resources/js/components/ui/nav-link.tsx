type NavLinkProps = {
    children: React.ReactNode,
    className?: string
}

function NavLink({ children, className }: NavLinkProps) {
    return (
        <nav
            className={`flex gap-4 items-center justify-between ${className ? className : ""}`}
        >
            {children}
        </nav>
    )
}

export default NavLink;