import Link from "./link"

type mediaProps = {
    name: string,
    link: string
}

export default function FooterSocialMedia() {
    const medias: mediaProps[] = [
        {
            name: 'Instagram',
            link: 'https://instagram.com/jeanpaulgaultier'
        },
        {
            name: 'Facebook',
            link: 'https://facebook.com/jeanpaulgaultier'
        },
        {
            name: 'TikTok',
            link: 'https://tiktok.com/jeanpaulgaultier'
        }
    ]

    return (
        <div
            className="flex gap-4 justify-start items-center"
        >
            {
                medias.map((value: mediaProps) => {
                    return (
                        <Link
                            target="_blank"
                            href={value.link}
                        >
                            {value.name}
                        </Link>
                    )
                })
            }
        </div>
    )
}