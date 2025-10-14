type TitleProps = {
    children: React.ReactNode,
    className: string,
}

export default function Title({ children, className }: TitleProps) {
    return (
        <h1
            className={className ? className : ""}
        >
            {children}
        </h1>
    )
}