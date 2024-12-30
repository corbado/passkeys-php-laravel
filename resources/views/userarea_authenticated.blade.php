@extends('layout')

@section('content')
    <h1>User area!</h1>
    <p>Since you are logged-in, we can tell you a secret:</p>
    <button id="reveal-secret-button" disabled>Reveal secret</button>
    <div id="reveal-secret-result"></div>
    <script>
        const revealSecretResult = document.getElementById("reveal-secret-result");
        const revealSecretButton = document.getElementById("reveal-secret-button");
        window.corbadoLoadPromise.then(() => {
            revealSecretButton.removeAttribute("disabled");
        });
        revealSecretButton.addEventListener("click", async () => {
            revealSecretButton.setAttribute("disabled", "true");
            await window.corbadoLoadPromise;
            revealSecretResult.innerHTML = `<div class="loader"></div>`;
            try {
                const response = await fetch("/api/secret", {
                    headers: {
                        Authorization: `Bearer ${Corbado.sessionToken}`
                    }
                });
                if (!response.ok) {
                    throw new Error(`Status: ${rsp.status}`);
                }
                const json = await response.json();
                revealSecretResult.innerHTML = `<div id="secret-box">
                                                    <h3>Secret: </h3>
                                                    <p>${json.secret}</p>
                                                </div>`;
            } catch (e) {
                console.warn(e);
                revealSecretResult.innerHTML = `<p>Failed to fetch secret. ${e}</p>`;
                revealSecretButton.removeAttribute("disabled");
            }
        });
    </script>
@endsection