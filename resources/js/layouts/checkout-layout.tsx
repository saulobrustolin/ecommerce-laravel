import { ReactNode } from "react";
import { Toaster } from "sonner";

export default function CheckoutLayout({ children }: { children: ReactNode }) {
    return (
        <main className="md:w-[768px] lg:w-[1024px] justify-self-center h-screen place-content-center space-y-12">
            <img src="/logo-white.svg" alt="Logo da loja" className="h-6 justify-self-center" />
            {children}
            <Toaster position="bottom-left"/>
        </main>
    )
}