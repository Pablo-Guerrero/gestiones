<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// Añadir los nuevos campos al formulario
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    institution: '', // Nuevo campo
    country: '', // Nuevo campo
    dedication: '', // Nuevo campo
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <!-- Nombre -->
            <div>
                <InputLabel for="name" value="Nombre" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <!-- Institución -->
            <div class="mt-4">
                <InputLabel for="institution" value="Institución" />

                <TextInput
                    id="institution"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.institution"
                    required
                />

                <InputError class="mt-2" :message="form.errors.institution" />
            </div>

            <!-- País -->
            <div class="mt-4">
                <InputLabel for="country" value="País" />

                <TextInput
                    id="country"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.country"
                    required
                />

                <InputError class="mt-2" :message="form.errors.country" />
            </div>

            <!-- Dedicación -->
            <div class="mt-4">
                <InputLabel for="dedication" value="Dedicación" />

                <TextInput
                    id="dedication"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.dedication"
                    required
                />

                <InputError class="mt-2" :message="form.errors.dedication" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <InputLabel for="email" value="Correo Electrónico" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <InputLabel for="password" value="Contraseña" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirmar Contraseña" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    ¿Ya estás registrado?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrarse
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
