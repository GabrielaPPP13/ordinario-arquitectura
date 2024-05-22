<div class="grid">
    <div class="col-12">
        <input class="form-control" name="email" placeholder="email" value="{{ optional($user ?? null)->email }}" />
    </div>
    <div class="col-12">
        <input class="form-control" name="name" placeholder="name" value="{{ optional($user ?? null)->name }}" />
    </div>
    <div class="col-12">
        <input class="form-control" name="password" placeholder="password" type="password" value="{{ optional($user ?? null)->password }}" />
    </div>
</div>