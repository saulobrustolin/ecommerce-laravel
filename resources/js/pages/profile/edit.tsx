import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import ProfileLayout from "@/layouts/profile-layout";
import { SharedData } from "@/types";
import { usePage } from "@inertiajs/react";
import axios from "axios";
import { LoaderCircle } from "lucide-react";
import { ChangeEvent, FormEvent, useState } from "react";
import { toast } from "sonner";

export default function ProfileEdit() {
    const [loading, setLoading] = useState<boolean>(false);

    const [name, setName] = useState<string>('');
    const [email, setEmail] = useState<string>('');

    const [password, setPassword] = useState<string>('');
    const [newPassword, setNewPassword] = useState<string>('');

    const { auth } = usePage<SharedData>().props;

    const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        setLoading(prev => !prev);

        const form = new FormData(e.currentTarget);
        const object = Object.fromEntries(form.entries());

        await axios.patch(`/api/user/${auth.user.id}`, object)
        .then(res => {
            toast.success(res.data.mensagem);

            setTimeout(() => {
                window.location.href = '/profile';
            }, 1000)
        })
        .catch(err => {
            toast.error(err.response.data.erro);
        })
        .finally(() => setLoading(false));
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
                        name="name"
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
                        type="email"
                        disabled={loading}
                        defaultValue={email}
                        name="email"
                        onChange={(event: ChangeEvent<HTMLInputElement>) => setEmail(event.target.value.trim())}
                    />
                </div>
                <div
                    className="w-full"
                >
                    <Label>Sua senha</Label>
                    <Input
                        placeholder="digite sua senha atual..."
                        className="w-full"
                        type="password"
                        disabled={loading}
                        defaultValue={password}
                        name="password"
                        onChange={(event: ChangeEvent<HTMLInputElement>) => setPassword(event.target.value.trim())}
                    />
                </div>
                <div
                    className="w-full"
                >
                    <Label>Sua nova senha</Label>
                    <Input
                        type="password"
                        placeholder="digite sua nova senha..."
                        className="w-full"
                        disabled={loading}
                        defaultValue={newPassword}
                        name="newpassword"
                        onChange={(event: ChangeEvent<HTMLInputElement>) => setNewPassword(event.target.value.trim())}
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