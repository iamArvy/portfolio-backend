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

// Define props and form state
const props = defineProps({
    user: Object,
    certifications: Array
});
const form = useForm({
    name: null,
    location: null,
    details: null,
    date: null,
    certified: false // Default to false
});

// Function to update form data
const updateFormData = (name, location, details, date, certified) => {
    form.name = name;
    form.location = location;
    form.details = details;
    form.date = date
    form.certified = certified;
};

// Initialize variables
let cid = null;
let isChecked = props.certified; // Initialize based on the certified prop

// Function to switch to edit mode
const switchtoedit = (name, location, details, date, certified, id) => {
    console.log(certified)
    if(certified>0){
        isChecked = true; // Update isChecked
    }
    updateFormData(name, location, details, date, isChecked);
    cid = id;
};

// Function to switch to create mode
const switchtocreate = () => {
    isChecked = false; // Update isChecked
    updateFormData(null, null, null,null, isChecked); // Initialize certified to false
    cid = null;
};

// Function to submit the form
const submit = () => {
    if (cid) {
        form.post(route('certification.edit', { 'certification': cid }), {
            // errorBag: 'updateProfileInformation',
            preserveScroll: true,
            onSuccess: () => switchtocreate()
        });
    } else {
        form.post(route('certification.create'), {
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
            Certifications
        </template>

        <template #description>
            <button @click="switchtocreate">Create New Certification</button>
            <div v-if="props.certifications">
                <div v-for="certification in props.certifications" :key="certification">
                    <button @click="switchtoedit(certification.name,certification.location, certification.details,certification.date, certification.certified, certification.id)">{{ certification.name }}</button>
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

            
            <!-- Location -->
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
            <!-- Details -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="details" value="Details" />
                <TextInput
                    id="details"
                    v-model="form.details"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.details" class="mt-2" />
            </div>
            <!-- Date -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="date" value="Date" />
                <TextInput
                    id="date"
                    v-model="form.date"
                    type="number"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.date" class="mt-2" />
            </div>
            <!-- Certified -->
            <div class="col-span-6 sm:col-span-4">
                <label for="certified" class="certified">
                    <input type="checkbox" name="certified" id="" v-model="isChecked">
                    <span>Certified</span>
                </label>
                <InputError :message="form.errors.certified" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>
            <div v-if="cid">
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
