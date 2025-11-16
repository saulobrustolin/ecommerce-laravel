import ProfileLayout from "@/layouts/profile-layout";
import { OrderProps, SharedData } from "@/types";
import { usePage } from "@inertiajs/react";
import axios from "axios";
import { useEffect, useState } from "react";

export default function Pedidos() {
    const { auth } = usePage<SharedData>().props;

    const [orders, setOrders] = useState<OrderProps[] | null>(null);

    useEffect(() => {
        (async () => {
            await axios.get(`/api/order/${auth.user.id}`)
                .then(r => setOrders(r.data))
        })()
    }, [])

    useEffect(() => {
        console.log(orders)
    }, [orders])

    return (
        <ProfileLayout>
            <div
                className="grid grid-cols-1 divide-y"
            >
                {
                    orders && orders.length > 0 ? (
                        orders.map((v: OrderProps, i: number) => {
                            return (
                                <div key={`${v.id}-${i}`} className="p-2 py-4 hover:bg-neutral-50/20 cursor-pointer">
                                    <div className="grid grid-cols-[50%_auto_auto_auto]">
                                        <div className="gap grid-cols-2 gap-4">
                                            <h2 className="opacity-75 text-sm">Nº {v.order_code}</h2>
                                            <h1>{v.product[0].name} 
                                                {v.product.length > 1 ? <span className="text-xs opacity-50">{` +${v.product.length - 1} itens`}</span> : ''}
                                            </h1>
                                        </div>
                                        <h3 className="justify-self-start self-center text-sm">{v.payment_method}</h3>
                                        <h3 className="self-center opacity-75 text-sm">{v.status}</h3>
                                        <div className="self-center">
                                            <h3 className="justify-self-end self-center font-bold">
                                                {`R$ ${String(v.total_price).replace('.', ',')}`}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            )
                        })
                    ) : (
                        <div className="font-bold text-xl">
                            <h1>Sem pedidos criados no momento. :L</h1>
                        </div>
                    )
                }
            </div>
        </ProfileLayout>
    )
}