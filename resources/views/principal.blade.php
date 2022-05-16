<h1 id="proyecto-openbanking">Proyecto OpenBanking</h1>
<p>Es un proyecto simple de API-Rest, desarrollado con tecnología Laravel para transacciones bancarias falsas (que sirven solo de ejemplo). Con esta API se van a poder realizar los siguiente tipos de transacción;</p>
<h3 id="crear-una-cuenta-con-un-balance-inicial-">Crear una cuenta con un balance inicial.</h3>
<pre><code>    Ruta: POST /event 
    Data: {<span class="hljs-string">"type"</span>:<span class="hljs-string">"deposit"</span>,<span class="hljs-string">"destination"</span>:<span class="hljs-string">"100"</span>,<span class="hljs-string">"amount"</span>:<span class="hljs-number">50</span>}  
    respuesta -&gt; <span class="hljs-number">201</span>, {<span class="hljs-string">"destination"</span>:{<span class="hljs-string">"origin"</span>:{<span class="hljs-string">"id"</span>:<span class="hljs-string">"100"</span>, <span class="hljs-string">"balance"</span>:<span class="hljs-number">50</span>}}
</code></pre><h3 id="depositar-en-una-cuenta-existente-">Depositar en una cuenta existente.</h3>
<pre><code>    Ruta: POST /event 
    Data: {<span class="hljs-string">"type"</span>:<span class="hljs-string">"deposit"</span>,<span class="hljs-string">"destination"</span>:<span class="hljs-string">"100"</span>,<span class="hljs-string">"amount"</span>:<span class="hljs-number">10</span>}
    respuesta -&gt; <span class="hljs-number">201</span>, {<span class="hljs-string">"destination"</span>:{<span class="hljs-string">"id"</span>:<span class="hljs-string">"100"</span>, <span class="hljs-string">"balance"</span>:<span class="hljs-number">60</span>}}
</code></pre><h3 id="consultar-el-balance-de-una-cuenta-existente-">Consultar el balance de una cuenta existente.</h3>
<pre><code><span class="hljs-symbol">   Ruta:</span> <span class="hljs-meta">GET</span> /<span class="hljs-keyword">/balance?account=100  </span>
   respuesta -&gt; <span class="hljs-number">200</span>, {<span class="hljs-string">"balance"</span>:<span class="hljs-number">60</span>}
</code></pre><h3 id="bloquear-un-retiro-de-una-cuenta-inexistente-">Bloquear un retiro de una cuenta inexistente.</h3>
<pre><code><span class="hljs-symbol">    Ruta:</span> POST /event 
<span class="hljs-symbol">    Data:</span> {<span class="hljs-string">"type"</span>:<span class="hljs-string">"withdraw"</span>, <span class="hljs-string">"origin"</span>:<span class="hljs-string">"200"</span>, <span class="hljs-string">"amount"</span>:<span class="hljs-number">10</span>}
    respuesta -&gt; <span class="hljs-number">404</span>, cuenta invalida
</code></pre><h3 id="extraer-saldo-de-una-cuenta-existente">Extraer saldo de una cuenta existente</h3>
<pre><code>    Ruta: POST /event 
    Data: {<span class="hljs-string">"type"</span>:<span class="hljs-string">"withdraw"</span>, <span class="hljs-string">"origin"</span>:<span class="hljs-string">"100"</span>, <span class="hljs-string">"amount"</span>:<span class="hljs-number">10</span>}
    respuesta -&gt; <span class="hljs-number">201</span>, {<span class="hljs-string">"origin"</span>:{<span class="hljs-string">"id"</span>:<span class="hljs-string">"100"</span>, <span class="hljs-string">"balance"</span>:<span class="hljs-number">50</span>}}
</code></pre><h3 id="realizar-transferencias-entre-cuentas-existentes">Realizar transferencias entre cuentas existentes</h3>
<pre><code>    Ruta: POST /event 
    Data: {<span class="hljs-string">"type"</span>:<span class="hljs-string">"transfer"</span>, <span class="hljs-string">"origin"</span>:<span class="hljs-string">"100"</span>, <span class="hljs-string">"amount"</span>:<span class="hljs-number">20</span>, <span class="hljs-string">"destination"</span>:<span class="hljs-string">"300"</span>}
    respuesta -&gt; <span class="hljs-number">201</span>, {<span class="hljs-string">"origin"</span>:{<span class="hljs-string">"id"</span>:<span class="hljs-string">"100"</span>, <span class="hljs-string">"balance"</span>:<span class="hljs-number">30</span>}, 
                <span class="hljs-string">"destination"</span>:{<span class="hljs-string">"id"</span>:<span class="hljs-string">"300"</span>, <span class="hljs-string">"balance"</span>:<span class="hljs-number">20</span>}}
</code></pre><h3 id="bloquear-transferencia-de-cuenta-inexistente">Bloquear transferencia de cuenta inexistente</h3>
<pre><code><span class="hljs-symbol">    Ruta:</span> POST /event 
<span class="hljs-symbol">    Data:</span> {<span class="hljs-string">"type"</span>:<span class="hljs-string">"transfer"</span>, <span class="hljs-string">"origin"</span>:<span class="hljs-string">"200"</span>, <span class="hljs-string">"amount"</span>:<span class="hljs-number">10</span>, <span class="hljs-string">"destination"</span>:<span class="hljs-string">"300"</span>}
    respuesta -&gt; <span class="hljs-number">404</span>, cuenta invalida
</code></pre><h3 id="reset-de-la-tabla-account-para-testing">Reset de la tabla account para testing</h3>
<pre><code>    Ruta: POST /reset 
    <span class="hljs-function"><span class="hljs-title">respuesta</span> -&gt;</span> <span class="hljs-number">200</span>, OK
</code></pre>