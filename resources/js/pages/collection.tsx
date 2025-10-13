import AppLayout from "@/layouts/app-layout";

type CollectionProps = {
    slug: string
}

export default function Collection({ slug }: CollectionProps) {
    return (
        <AppLayout
            sticky={true}
        >
            <div
                className="bg-white min-h-screen p-4"
            >
                <div
                    className="flex items-center py-12 px-20 gap-1"
                >
                    <h1
                        className="text-4xl text-stone-800 font-black capitalize"
                    >
                        {slug}
                    </h1>
                    <span className="text-stone-800 text-xs font-semibold">[200 produtos]</span>
                </div>
            </div>
        </AppLayout>
    )
}