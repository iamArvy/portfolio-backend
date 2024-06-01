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
    projects: Array
});
const updateformData =(a, b, c, d, e)=> {
    form.name=a
    form.about=b
    form.stacks=c
    form.url=d
    form.git=e
}
const form = useForm({
    name: null,
    img: null,
    stacks: null,
    url: null,
    about: null,
    git: null,
});
var id = null;
const photoPreview = ref(null);
const photoInput = ref(null);


const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};


const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};

const switchtoedit=(a, b, c, d, e, f, g)=>{
    updateformData(a, c, d, e, f)
    clearPhotoFileInput()
    photoPreview.value = b;
    id = g
}
const switchtocreate=()=>{
    updateformData(null,null,null,null, null)
    clearPhotoFileInput()
    photoPreview.value = null;
    id = null
}
const submit = () => {
    if (photoInput.value) {
            form.img = photoInput.value.files[0];
        }
        else{
            form.img = null;
        }
    if(id){
        form.post(route('project.edit',{'project':id}), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => switchtocreate()
    });
    }else{
        form.post(route('project.create'), {
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
            Projects
        </template>

        <template #description>
            <button @click="switchtocreate">Create New Project</button>
            <div v-if="props.projects">
                <div v-for="project in props.projects" :key="project">
                    <button @click="switchtoedit(project.name, project.img, project.about, project.stacks, project.url, project.git, project.id)">{{ project.name }}</button>
                </div>
            </div>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input
                    id="photo"
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                >

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <!-- <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div> -->

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                    
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <InputError :message="form.errors.img" class="mt-2" />
            </div>
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
                <InputLabel for="about" value="About" />
                <TextInput
                    id="about"
                    v-model="form.about"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.about" class="mt-2" />
            </div>
            <!-- Type -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="stacks" value="Stacks" />
                <TextInput
                    id="stacks"
                    v-model="form.stacks"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.stacks" class="mt-2" />
            </div>
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
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="git" value="Git" />
                <TextInput
                    id="git"
                    v-model="form.git"
                    type="url"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.git" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>
            <div v-if="id">
                <SecondaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background-color: red;">
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
<style scoped>
.photoPreview{
    width: 100%;
    height: 200px;
    background-color: blue;
}
.myform{
    display: flex;
    flex-direction: row;
    min-width: 700px;
    justify-content: space-evenly;
}
.mycards{
    width: 50%;
}
</style>

