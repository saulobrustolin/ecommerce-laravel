import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import ProfileLayout from "@/layouts/profile-layout";
import { SharedData } from "@/types";
import { usePage } from "@inertiajs/react";
import { CircleCheck, CircleX, LoaderCircle } from "lucide-react";
import { ChangeEvent, FormEvent, useState } from "react";
import { toast } from "sonner";

export default function ProfileEdit() {
    const [loading, setLoading] = useState<boolean>(false);

    const [name, setName] = useState<string>('');
    const [email, setEmail] = useState<string>('');

    const { auth } = usePage<SharedData>().props;

    const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        setLoading(prev => !prev);

        const object: { name?: string, email?: string } = {};

        name ? object.name = name : null;
        email ? object.email = email : null;

        try {
            const options = {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(object)
            }

            const response = await fetch('/api/user/' + auth.user.id, options);
            const json = await response.json();
            console.log(options.body)
            if (response.ok) {
                toast('Sucesso ao editar suas informações!', { icon: <CircleCheck className="text-lime-500 size-5 mr-2" /> })
                console.log(json)
                setLoading(prev => !prev)
                return
            } else {
                console.log(json)
                toast('Não foi possível editar seus dados, tente novamente mais tarde!', { icon: <CircleX className="text-red-500 size-5 mr-2" /> })
                setLoading(prev => !prev)
                return
            }
        } catch {
            toast('Não foi possível editar seus dados, tente novamente mais tarde!', { icon: <CircleX className="text-red-500 size-5 mr-2" /> })
            setLoading(prev => !prev)
        }
    }
    
    return (
        <ProfileLayout>
            <form
                className="grid grid-cols-1 lg:grid-cols-2 gap-2 w-full"
                onSubmit={handleSubmit}
            >
                <div
                    className="w-full"
                >
                    <Label>Novo nome</Label>
                    <Input
                        placeholder="digite seu novo nome..."
                        className="w-full"
                        disabled={loading}
                        defaultValue={name}
                        onChange={(event: ChangeEvent<HTMLInputElement>) => setName(event.target.value.trim())}
                    />
                </div>
                <div
                    className="w-full"
                >
                    <Label>Novo e-mail</Label>
                    <Input
                        placeholder="digite seu novo e-mail..."
                        className="w-full"
                        disabled={loading}
                        defaultValue={email}
                        onChange={(event: ChangeEvent<HTMLInputElement>) => setEmail(event.target.value.trim())}
                    />
                </div>
                <Button
                    className="font-semibold cursor-pointer lg:col-span-2 mt-4"
                    type="submit"
                    disabled={loading}
                    >
                    {
                        loading ? (
                            <LoaderCircle
                            className="animate-spin"
                            />
                        ) : null
                    }
                    Enviar alterações
                </Button>
            </form>
        </ProfileLayout>
    )
}