<style>
    .footerwrapper{
        padding: 20px 20px 20px 10px;
    }
    .copyright{        
        padding: 20px;
    }
</style>
        <div class="footer">
            <div class="footerwrapper">
                <div class="socialsfirst">
                    <h2>SOLUTIONS. SUPPORT. <br><span>EXCLUSIVE OFFERS!</span></h2>
                    Sign up for our monthly newsletter today<br> and stay ahead!<br>
                    <input type="text" name="newsletter" id="newsletter" placeholder="Enter your email..."><label for="newsletter"><button type="button">Sign Up</button></label>
                </div>
                <div>
                    <div class="socials">
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="images/facebook.png" alt="facebook">
                        </a>
                        <a href="https://www.twitter.com" target="_blank">
                            <img src="images/twitter.png" alt="twitter">
                        </a>
                        <a href="https://www.whatsapp.com" target="_blank">
                            <img src="images/whatsapp.png" alt="whatsapp">
                        </a>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="images/youtube.png" alt="youtube">
                        </a>
                        <p><a href="#">Visit our Blog</a></p>
                    </div>
                    <hr>
                    <div class="socialwrapper">
                        <div class="socialitem">
                            <h3>Learn More</h3>
                            <a href="#">About Homify</a>
                            <a href="#">See All Properties</a>
                            <a href="#">Search by Categories</a>
                            <a href="#">Brands</a>
                        </div>
                        <div class="socialitem">
                            <h3>More From Homify</h3>
                            <a href="#">Payment Integration</a>
                            <a href="#">Property Verification</a>
                            <a href="#">Enrollment Process</a>
                            <a href="#">Safety & Security</a>
                        </div>
                        <div class="socialitem">
                            <h3>Upcoming Features</h3>
                            <a href="#">Remote Inspection</a>
                            <a href="#">Barcode Generation</a>
                            <a href="#">User Services</a>
                            <a href="#">Logistics Support</a>
                        </div>
                        <div class="socialitem">
                            <h3>For Businesses</h3>
                            <a href="#">Listing Multiple Properties</a>
                            <a href="#">Service Charge</a>
                            <a href="#">Terms & Conditions</a>
                            <a href="#">Advertisements</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>
                    <span>COPYRIGHT &copy; 2022, HOMIFY LIMITED. ALL RIGHTS RESERVED.</span>
                    By continuing past this page and/or using this site, you agree to abide by the <a href="#">Terms & Conditions</a> for this site, which prohibit commercial use of any information on this site.
                </p>
            </div>

        </div>
    </div><script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
    <script src="gsap/gsap/minified/ScrollTrigger.min.js"></script>
    <script src="gsap/gsap/minified/ScrollToPlugin.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollToPlugin3.min.js"></script>
    
<script src="jquery/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">
        gsap.from('.anim',{opacity: 0, duration: 1, y: -50, stagger: 0.6});
        //scroll trigger
        gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);
        gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

/* Main navigation */
let panelsSection = document.querySelector("#container"),
	panelsContainer = document.querySelector("#panel"),
 	tween;

     /* Panels */
 const panels = gsap.utils.toArray("#panel .sliderchild");
 tween = gsap.to(panels, {
	xPercent: -100 * ( panels.length - 1 ),
 	ease: "none",
 	scrollTrigger: {
 		trigger: "#container",
 		pin: true,
 		start: "top top",
 		scrub: true,
 		animation: panels,
    end: "+=4000",
     anticipatePin: 1
 	}
});

// gsap.defaults({ease: "none", duration: 2});
// const rt = gsap.utils.toArray(".sliderchild")
// const tl = rt.gsap.timeline();
// tl.from("#slide1",{xPercent: -100})
// .from("#slide2",{xPercent: 100})
// .from("#slide3",{xPercent: 100})
// .from("#slide4",{xPercent: 100})
// .from("#slide5",{xPercent: 100})
// .from("#slide6",{xPercent: 100})
// .from("#slide7",{xPercent: 100})
// .from("#slide8",{xPercent: 100})
// .from("#slide9",{xPercent: 100})
// .from("#slide10",{xPercent: 100})
// .from("#slide11",{xPercent: 100})
// .from("#slide12",{xPercent: 100})
// .from("#slide13",{xPercent: 100})
// .from("#slide14",{xPercent: 100})
// .from("#slide15",{xPercent: 100})
// .from("#slide16",{xPercent: 100})
// .from("#slide17",{xPercent: 100});

// ScrollTrigger.create({
//     animation: tl,
//     trigger: "#container",
//     start: "top top",
//     end: "+=4000",
//     scrub: true,
//     pin: true,
//     anticipatePin: 1
// });
    </script>
</body>
</html>