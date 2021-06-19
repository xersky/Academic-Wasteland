<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Untitled</title>
<style bs-system-element="" bs-hidden="">
    html::-webkit-scrollbar {
    height: 7px;
    width: 7px;
    background: #2f363a;
    }
    html::-webkit-scrollbar-thumb {
    background: rgb(137, 143, 146);
    }
    html::-webkit-scrollbar-thumb:hover {
    background: #767F82;
    }
    html::-webkit-scrollbar-corner {
    display:none;
    }
    html{
    -webkit-user-select: none;
    user-select:none;
    overflow: auto !important;
    }
    body{
    min-height:650px;
    }
    body[bs-extra-whitespace]:after {
    content:'';
    display: block;
    height: 500px;
    }
    *{
    cursor:default !important;
    pointer-events:all !important;
    }
    a{
    cursor:text;
    }
    img:not([src]):not([srcset]){
    width: 100px;
    height: 80px;
    position: relative;
    }
    img:not([src]):not([srcset]):after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='50' height='50'%3E%3Cdefs%3E%3Cpath d='M23 31l-3.97-2.9L19 28l-.24-.09.19.13L13 33v2h24v-2l-3-9-5-3-6 10zm-2-12c0-1.66-1.34-3-3-3s-3 1.34-3 3 1.34 3 3 3 3-1.34 3-3zm-11-8c-.55 0-1 .45-1 1v26c0 .55.45 1 1 1h30c.55 0 1-.45 1-1V12c0-.55-.45-1-1-1H10zm28 26H12c-.55 0-1-.45-1-1V14c0-.55.45-1 1-1h26c.55 0 1 .45 1 1v22c-.3.67-.63 1-1 1z' id='a'/%3E%3C/defs%3E%3Cuse xlink:href='%23a' fill='%23fff'/%3E%3Cuse xlink:href='%23a' fill-opacity='0' stroke='%23000' stroke-opacity='0'/%3E%3C/svg%3E");
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #eaeaeb;
    }
    /* Stopping css animations on the stage */
    *:not([bs-anim-preview]){
    transition:none !important;
    transition-duration: 0s !important;
    }
    [bs-dragged]{
    opacity:0.3 !important;
    }
    /* Inline editing */
    [contenteditable=true] {
    box-shadow:-1px -1px 1px rgba(17, 142, 232, 0.85), 
    1px 1px 1px rgba(17, 142, 232, 0.85), 
    0 0 11px rgba(17, 142, 232, 0.85) !important;
    outline:none !important;
    min-height:1em;
    cursor:initial !important;
    }
    [contenteditable=true] *:not([contenteditable=false]){
    cursor:initial !important;
    }
    [contenteditable=true]:empty:before {
    content: "\00a0\00a0" !important;
    }
    [contenteditable=true] [contenteditable=false] {
    box-shadow:0 0 0 1px rgba(17, 142, 232, 0.85);
    }
    /* Preventing mouse events for embeds */
    iframe, embed, object, audio{
    pointer-events: none !important;
    }
    html.hit-testing iframe,
    html.hit-testing embed,
    html.hit-testing object,
    html.hit-testing audio {
    pointer-events: all !important;
    }
    /* Modal scroll and canvas scroll have the same styles: */
    body.modal-open .modal::-webkit-scrollbar {
    height: 7px;
    width: 7px;
    background: rgba(0,0,0,0.2);
    }
    body.modal-open .modal::-webkit-scrollbar-corner {
    display: none;
    }
    body.modal-open .modal::-webkit-scrollbar-thumb {
    background: rgb(137, 143, 146);
    }
    body.modal-open .modal::-webkit-scrollbar-track {
    background: #2f363a;
    }
    /* Giving sizes to some elements. */
    div[class*="col-"]:empty:before,
    form:empty:before,
    .row:empty:before,
    .form-row:empty:before,
    .form-group:empty:before,
    .container:empty:before,
    div[class*="container-"]:empty:before{
    background-color: #eee;
    content: 'Empty Row';
    font-size: 20px;
    color: #aaa;
    font-weight: bold;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 80px;
    padding: 0 10px;
    line-height: 26px;
    }
    div[class*="col-"]:empty:before{
    content:'Empty Column';
    }
    form:empty:before{
    content:'Empty Form';
    }
    .form-group:empty:before{
    content:'Empty Form Group';
    }
    form.navbar-form:empty:before{
    display: inline-block;
    padding:0 40px;
    font-size:16px;
    line-height:36px;
    }
    .container:empty:before,
    div[class*="container-"]:empty:before{
    content:'Empty Container';
    }
    .thumbnail img:not([src]){
    background-repeat: no-repeat;
    background-size: 100% 85%;
    background-position-y: 50%;
    width: 100%;
    height: 180px;
    }
    /* Making the dropdown menus have a white background when they're edited */
    .dropdown-item:active,
    .dropdown-menu>li>a:focus{
    background:unset;
    color:unset;
    }
    /* This is needed because the li items are 0x0px by default,
    and bootstrap studio can't select them */
    .pagination>li {
    float: left;
    }
    /* Iframes without src are colored in gray */
    .embed-responsive iframe:not([src]){
    background-color:#ddd;
    }
    /* This is needed, otherwise split buttons in input groups break into two lines. */
    .input-group-btn .btn-group > .btn{
    float:none;
    }
    div[class*="col-"]:empty,		
    div.col:empty{
    display:flex;
    }
    div[class*="col-"]:empty:before,
    form:empty:before,
    .row:empty:before,
    .form-row:empty:before,
    .container:empty:before, 
    div[class*="container-"]:empty:before{
    width: 100%;
    }
    div.col:empty:before{
    background-color:#eee;
    content:'Empty Column';
    line-height:40px;
    text-align: center;
    display:block;
    line-height:80px;
    font-size:24px;
    color:#aaa;
    font-weight:bold;
    width:100%;
    }
    .toast-header img:not([src]):not([srcset]) {
    width: 30px;
    height: 30px;
    }
    /* Stopping css spinner animations */
    .spinner-grow:not([bs-spinner-animation]),
    .spinner-border:not([bs-spinner-animation]) {
    animation: none;
    }
    .spinner-grow:not([bs-spinner-animation]) {
    opacity: 1;
    transform: scale(.8);
    }
    .custom-range::-webkit-slider-runnable-track {
    cursor: inherit;
    }
    /* Prevent stretched links from capturing all page clicks */
    a.stretched-link:after {
    pointer-events: none;
}
</style>
<style>.contact-clean {
    background-color: transparent;
    padding: 80px 0;
    
    }
    @media (max-width:767px) {
    .contact-clean {
    padding: 20px 0;
    }
    }
    .contact-clean form {
    max-width: 480px;
    width: 100%;
    margin: 0 auto;
    background-color: none;
    padding: 40px;
    border-radius: 4px;
    color: #505e6c;
    box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
    }
    @media (max-width:767px) {
    .contact-clean form {
    padding: 30px;
    }
    }
    .contact-clean h2 {
    margin-top: 5px;
    font-weight: bold;
    font-size: 28px;
    margin-bottom: 36px;
    color: inherit;
    }
    .contact-clean .form-group:last-child {
    margin-bottom: 5px;
    }
    .contact-clean form .form-control {
    background: none;
    border-radius: 2px;
    box-shadow: 1px 1px 1px rgba(0,0,0,0.05);
    outline: none;
    color: inherit;
    padding-left: 12px;
    height: 42px;
    }
    .contact-clean form .form-control:focus {
    border: 1px solid #b2b2b2;
    }
    .contact-clean form textarea.form-control {
    min-height: 100px;
    max-height: 260px;
    padding-top: 10px;
    resize: vertical;
    }
    .contact-clean form .btn {
    padding: 16px 32px;
    border: none;
    background: none;
    box-shadow: none;
    text-shadow: none;
    opacity: 0.9;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 13px;
    letter-spacing: 0.4px;
    line-height: 1;
    outline: none !important;
    }
    .contact-clean form .btn:hover {
    opacity: 1;
    }
    .contact-clean form .btn:active {
    transform: translateY(1px);
    }
    .contact-clean form .btn-primary {
    background-color: #055ada !important;
    margin-top: 15px;
    color: #fff;
    }
</style>
<section class="contact-clean">
    <form method="post" action="../../../Server/HandleProviderRequests.php">
    <h2 class="text-center">Client Data Center</h2>
    <div class="form-group"><input id="name" type="text" class="form-control" name="name" placeholder="Name" required></div>
    <div class="form-group"><input id="cin" type="text" class="form-control" name="cin" placeholder="Cin" required></div>
    <div class="form-group"><input id="email" type="email" class="form-control is-invalid" name="email" placeholder="Email" required><small class="form-text text-danger">Please enter a correct email address.</small></div>
    <div class="form-group"><input id="phone" type="tel" class="form-control" name="phone" placeholder="Telephone" required></div>
    <textarea class="form-control" id="adress" name="adress" placeholder="Address" rows="14" required></textarea>
    <div id="addPart" class="form-group text-center d-sm-flex flex-fill m-auto justify-content-sm-center align-items-sm-end" style="margin:25px !important;">
        <button id="sendbtn" class="btn btn-outline-primary active text-success border rounded-0 d-flex flex-grow-1" type="submit" name="post">send </button>
        <button id="restbtn" class="btn btn-primary active btn-lg text-secondary bg-danger border rounded-0 d-sm-flex flex-grow-1 justify-content-sm-start" type="reset">Reset</button>
    </div>
    <div id="editPart" class="form-group text-center d-sm-flex flex-fill m-auto justify-content-sm-center align-items-sm-end" style="margin:25px  !important;">
        <button id="updtbtn" class="btn btn-primary active text-warning bg-warning border rounded-0 flex-grow-1" type="submit" name="put">update</button>
        <button id="deltbtn" class="btn btn-primary active btn-lg text-danger bg-danger border rounded-0 d-sm-flex flex-grow-1 justify-content-sm-start" type="button" name="del">delete</button>
    </div>
    <div class="form-group text-center d-sm-flex flex-fill m-auto justify-content-sm-center align-items-sm-end">
        <div class="btn active d-flex flex-grow-1 modal-close"  onclick="HideModal()">X</div>
    </div>
    </form>
</section>