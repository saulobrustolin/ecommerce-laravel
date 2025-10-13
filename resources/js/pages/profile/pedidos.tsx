import ProfileLayout from "@/layouts/profile-layout";
import { OrderProps, SharedData } from "@/types";
import { usePage } from "@inertiajs/react";
import { useState } from "react";

export default function Pedidos() {
    const { auth } = usePage<SharedData>().props;

    const [orders, setOrders] = useState<OrderProps[] | null>(null);

    const handleOrders = async () => {
        const response = await fetch(import.meta.env.API_ENDPOINT + '/api/order/' + auth.user.id);
        if (response.ok) {
            const json = await response.json()
            setOrders(json)
        }
    }

    handleOrders();

    return (
        <ProfileLayout>
            <div
            >
                {
                    orders ? (
                        <></>
                    ) : null
                }
            </div>
        </ProfileLayout>
    )
}