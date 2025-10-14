import LinkFooter from "./ui/link-footer"

type LinksProps = {
    name: string,
    link: string
}

type PagesProps = {
    title: string,
    links: LinksProps[]
}

export default function ColumnPages() {
    const pages: PagesProps[] = [
        {
            title: 'contatos',
            links: [
                {
                    name: 'email: fashiopn@jpgaultier.fr',
                    link: 'email:fashiopn@jpgaultier.fr'
                },
                {
                    name: 'instagram: @jeanpaulgaultier',
                    link: 'https://instagram.com/jeanpaulgaultier'
                },
            ]
        },
        {
            title: 'ajuda',
            links: [
                {
                    name: 'minha conta',
                    link: '/profile'
                },
                {
                    name: 'faq',
                    link: '/faq'
                },
                {
                    name: 'envio e retornos',
                    link: '/envio-e-retornos'
                },
                {
                    name: 'termos e condições de venda',
                    link: '/termos-condicoes-venda'
                },
                {
                    name: 'termos e condições de uso',
                    link: '/termos-codicoes-uso'
                },
                {
                    name: 'política de privacidade',
                    link: '/politica-de-privacidade'
                }
            ]
        },
        {
            title: 'sobre nós',
            links: [
                {
                    name: 'cookies',
                    link: '/politica-de-cookies'
                },
                {
                    name: 'acessibilidade',
                    link: '/acessibilidade'
                }
            ]
        },
    ]

    return (
        <div
            className="grid grid-cols-1 md:grid-cols-3 max-w-3/4 gap-4"
        >
            {
                pages.map((value: PagesProps) => {
                    return (
                        <div
                            key={value.title}
                        >
                            <h3
                                className="uppercase mb-4 font-semibold"
                            >
                                {value.title}
                            </h3>
                            <ul
                                className="flex flex-col gap-2"
                            >
                                {
                                    value.links.map((link: LinksProps) => {
                                        return (
                                            <li
                                                key={link.name}
                                            >
                                                <LinkFooter
                                                    href={link.link}
                                                >
                                                    {link.name}
                                                </LinkFooter>
                                            </li>
                                        )
                                    })
                                }
                            </ul>
                        </div>
                    )
                })
            }
        </div>
    )
}