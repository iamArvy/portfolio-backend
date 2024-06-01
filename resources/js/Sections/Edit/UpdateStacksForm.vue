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
    stacks: Array
});
const updateformData =(name, level)=> {
    form.name=name,
    form.level=level
}
const form = useForm({
    name: null,
    level: null,
});
var id = null;

const switchtoedit=(a, b, c)=>{
    updateformData(a,b)
    id = c
}
const switchtocreate=()=>{
    updateformData(null,null)
    id = null
}
const submit = () => {
    if(id){
        form.post(route('stack.edit',{'stack':id}), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => switchtocreate()
    });
    }else{
        form.post(route('stack.create'), {
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
            Stacks
        </template>

        <template #description>
            <button @click="switchtocreate">Create New Stack</button>
            <div v-for="stack in $page.props.stacks" :key="stack">
                <button @click="switchtoedit(stack.name, stack.level, stack.id)">{{ stack.name }}</button>
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
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="level" value="Level" />
                <TextInput
                    id="level"
                    v-model="form.level"
                    type="number"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="form.errors.level" class="mt-2" />
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
