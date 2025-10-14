import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
import OpenPopover from '@/components/open-popover';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import ProfileLayout from '@/layouts/profile-layout';
import { SharedData } from '@/types';
import { Form, Head, usePage } from '@inertiajs/react';
import { SquarePen } from 'lucide-react';
import { useState } from 'react';

export default function Profile() {
    const { auth } = usePage<SharedData>().props;

    const [loading, setLoading] = useState<boolean>(false);

    return (
        <ProfileLayout>
            <Head title="Profile" />

            <a
                href='/profile/edit'
                className='w-fit flex gap-2 cursor-pointer items-center bg-white p-2 rounded text-black/80 text-sm font-semibold hover:bg-white/80 self-end'
            >
                <SquarePen size={18} />
                Editar
            </a>
            <div>
                <div
                    className='grid grid-cols-1 lg:grid-cols-2 p-6 gap-4 w-full'
                >
                    <div
                        className='flex flex-col gap-2'
                    >
                        <span
                            className='text-white/75'
                        >
                            Nome
                        </span>
                        {auth.user.name}
                    </div>
                    <div
                        className='flex flex-col gap-2'
                    >
                        <span
                            className='text-white/75'
                        >
                            E-mail
                        </span>
                        {auth.user.email}
                    </div>
                    <div
                        className='flex flex-col gap-2'
                    >
                        <span
                            className='text-white/75'
                        >
                            Autenticação 2-fatores
                        </span>
                        {auth.user.two_factor_enabled ? 'Sim' : 'Não'}
                    </div>
                </div>
                <div
                    className='text-end mt-4'
                >
                    <OpenPopover
                        trigger="Excluir minha conta"
                        className='hover:underline underline-offset-2 cursor-pointer text-sm text-white/50'
                    >
                        <div
                            className='flex flex-col gap-2'
                        >
                            <Label>
                                Tem certeza que deseja deletar sua conta?
                            </Label>
                            <span
                                className='text-white/50 font-light text-sm lg:text-xs mb-4'
                            >
                                Assim que você deletar sua conta perderá todos os seus pedidos, pontos, cupons e promoções acumuladas. Sem possibilidade de reversão.
                            </span>
                            <Form
                                {...ProfileController.destroy.form()}
                                className='space-y-4'
                            >
                                <Label
                                    className='text-sm lg:text-xs'
                                >
                                    Confirme sua senha
                                </Label>
                                <Input
                                    name='password'
                                    type='password'
                                />
                                <Button
                                    className='cursor-pointer rounded'
                                >
                                    Excluir conta
                                </Button>
                            </Form>
                        </div>
                    </OpenPopover>
                </div>
            </div>
        </ProfileLayout>
    );
}
