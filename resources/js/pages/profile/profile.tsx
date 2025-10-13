import ProfileLayout from '@/layouts/profile-layout';
import { SharedData } from '@/types';
import { Head, usePage } from '@inertiajs/react';
import { SquarePen } from 'lucide-react';


export default function Profile() {
    const { auth } = usePage<SharedData>().props;

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
                    <span
                        className='cursor-pointer hover:underline text-red-500'
                    >
                        Excluir minha conta
                    </span>
                </div>
            </div>
        </ProfileLayout>
    );
}
