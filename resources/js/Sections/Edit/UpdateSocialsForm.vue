<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
    socials: Array
});
const updateformData =(name, handle, url)=> {
    form.name=name
    form.socialhandle=handle
    form.url=url
}
const form = useForm({
    name: null,
    socialhandle: null,
    url: null,
});
var sid = null;

const switchtoedit=(name, handle, url, eid)=>{
    updateformData(name, handle, url)
    sid = eid
}
const switchtocreate=()=>{
    updateformData(null,null,null)
    sid = null
}
const submit = () => {
    if(sid){
        form.post(route('social.edit',{'social':sid}), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => switchtocreate()
    });
    }else{
        form.post(route('social.create'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => switchtocreate()
    });
    }
};
const deleteButton = () =>{
    router.post(route('social.delete',{'social':sid}))
}
</script>

<template>
    <FormSection @submit.prevent="submit">
        <template #title>
            Socials
        </template>

        <template #description>
            <button @click="switchtocreate">Create New Social</button>
            <div v-if="$page.props.socials">
                <div v-for="social in $page.props.socials" :key="social">
                    <button @click="switchtoedit(social.name, social.handle, social.url, social.id)"><i :class="social.name"></i></button>
                </div>
            </div>
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            
            <!-- Level -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="handle" value="Handle" />
                <TextInput
                    id="handle"
                    v-model="form.socialhandle"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.socialhandle" class="mt-2" />
            </div>
            <!-- Type -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="url" value="Url" />
                <TextInput
                    id="url"
                    v-model="form.url"
                    type="url"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.url" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>
            <div v-if="sid">
                <SecondaryButton @click="deleteButton" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background-color: red;">
                    Delete
                </SecondaryButton>
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </PrimaryButton>
            </div>
            <div v-else>
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create
                </PrimaryButton>
            </div>
        </template>
    </FormSection>
</template>
