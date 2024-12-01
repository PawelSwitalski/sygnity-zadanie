<form action="{{ route('language.switch') }}" method="POST">
    @csrf
    <select name="language" onchange="this.form.submit()" class="p-1 rounded bg-gray-100 text-gray-800">
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>{{ __('navigation.English') }}</option>
        <option value="pl" {{ app()->getLocale() === 'pl' ? 'selected' : '' }}>{{ __('navigation.Polish') }}</option>
    </select>
</form>
