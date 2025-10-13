import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import ProfileLayout from "@/layouts/profile-layout";
import { Form } from "@inertiajs/react";
import { LoaderCircle } from "lucide-react";
import { useState } from "react";

export default function ProfileEdit() {
    const [loading, setLoading] = useState<boolean>(false);

    const handleSubmit = async () => {
        setLoading(prev => !prev);
    }
    
    return (
        <ProfileLayout>
            <Form
                className="grid grid-cols-2 gap-2 w-full"
                onSubmit={handleSubmit}
            >
                <div
                    className="w-full"
                >
                    <Label>Novo nome</Label>
                    <Input
                        placeholder="digite seu novo nome..."
                        className="w-full"
                    />
                </div>
                <div
                    className="w-full"
                >
                    <Label>Novo e-mail</Label>
                    <Input
                        placeholder="digite seu novo e-mail..."
                        className="w-full"
                    />
                </div>
            </Form>
            <Button
                className="font-semibold cursor-pointer"
                type="submit"
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
        </ProfileLayout>
    )
}