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
    experience: Array
});
const updateformData =(name, location, p, start, end)=> {
    form.name=name
    form.location=location
    form.p= p
    form.start=start
    form.end=end
}
const form = useForm({
    name: null,
    location: null,
    p: null,
    start: null,
    end: null
});
var id = null;

const switchtoedit=(a, b, c, d, e, f)=>{
    updateformData(a, b, c, d, e)
    id = f
}
const switchtocreate=()=>{
    updateformData(null,null,null, null, null)
    id = null
}
const submit = () => {
    if(id){
        form.post(route('experience.edit',{'experience':id}), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => switchtocreate()
    });
    }else{
        form.post(route('experience.create'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => switchtocreate()
    });
    }
};
</script>

<template>
    <FormSection @submit.prevent="submit">
        <template #title>
            Experience
        </template>

        <template #description>
            <button @click="switchtocreate">Create New Experience</button>
            <div v-for="exp in props.experience" :key="exp">
                <button @click="switchtoedit(exp.name, exp.location, exp.post, exp.start, exp.end, exp.id)">{{ exp.name }}</button>
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
                <InputLabel for="location" value="Location" />
                <TextInput
                    id="location"
                    v-model="form.location"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.location" class="mt-2" />
            </div>
            <!-- Type -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="post" value="Post" />
                <TextInput
                    id="post"
                    v-model="form.p"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.p" class="mt-2" />
            </div>
            <!-- Start -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="start" value="Start" />
                <TextInput
                    id="start"
                    v-model="form.start"
                    type="number"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.start" class="mt-2" />
            </div>
            <!-- End -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="end" value="End" />
                <TextInput
                    id="end"
                    v-model="form.end"
                    type="number"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.end" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>
            <div v-if="id">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background-color: red;">
                    Delete
                </PrimaryButton>
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
