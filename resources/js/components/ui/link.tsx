type LinkProps = {
    children: React.ReactNode,
    href: string,
    className?: string,
    target?: string
}

function Link({ children, href, className, target }: LinkProps) {
    return (
        <a
            className={`font-black text-sm uppercase hover:underline hover:underline-offset-2 decoration-2 underline-offset-0 transition-all ` + (className ? className : "")}
            target={target ? target : '_self'}
            href={href}
        >
            {children}
        </a>
    )
}

export default Link;