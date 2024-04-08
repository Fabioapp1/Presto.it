<form action="{{ route('setLocale', $lang)  }}" method="POST" class=" d-inline-flex ">
    @csrf
    <button class="bg-transparent p-0 m-0 btn-flag" type="submit">
        <img height="25" width="47" src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" alt="$lang">
    </button>
    <div>{{ strtoupper($lang) }}</div>
</form>