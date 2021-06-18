// const navicon = document.getElementById("nav__icon");
// const headerNav = document.querySelector(".header__nav");
// const sidebar = document.getElementById("nav__sidebar");
// const dashboard = document.getElementById("dashboard");

// navicon.addEventListener("click", () => {
// 	headerNav.classList.toggle("active-icon");
// 	sidebar.classList.toggle("active-sidebar");
// 	dashboard.classList.toggle("active-dashboard");
// });

//Copy Function

function copyFunction() {
	var copyText = document.getElementById("ReferralLink");
	copyText.select();
	document.execCommand("Copy");
	document.getElementById("tooltip").textContent =
		"Copied Referral Link: " + copyText.value;
}

function copyWallet() {
	var copyText = document.getElementById("walletAddress");
	copyText.select();
	document.execCommand("Copy");
	document.getElementById("walletTooltip").textContent =
		"Copied Wallet Address Link: " + copyText.value;
}

// Dashboard investment function

function dashboardplan() {
	function disableButton() {
		document.getElementById("gold__btn").disabled = true;
	}

	function enableButton() {
		document.getElementById("gold__btn").disabled = false;
	}

	document.getElementById("gold").onblur = function () {
		let status = document.getElementById("gold").value;

		if (status < 10001 || status > 50000) {
			document.getElementById("alert-gold").style.display = "block";
			document.getElementById("alert-gold").innerHTML =
				"Input amount between MIN $10,001 - MAX $50,000";
			disableButton();
		} else {
			document.getElementById("alert-gold").style.display = "none";
			document.getElementById("alert-gold").innerHTML = "";
			enableButton();
		}
	};
}

function OngoldkeyUp() {
	let status = document.getElementById("gold").value;
	let donationROI = parseInt(status) * 3.5;
	document.getElementById("gold-profit").innerHTML =
		"Compound Profit $" + donationROI + " in 10days";
}
// End of Dashboard investment function

// Gold plan investment function

function gold2plan() {
	function disableButton() {
		document.getElementById("gold2__btn").disabled = true;
	}

	function enableButton() {
		document.getElementById("gold2__btn").disabled = false;
	}

	document.getElementById("gold2").onblur = function () {
		let status = document.getElementById("gold2").value;

		if (status < 50001 || status > 100000) {
			document.getElementById("alert-gold2").style.display = "block";
			document.getElementById("alert-gold2").innerHTML =
				"Input amount between MIN $50,001 - MAX $100,000";
			disableButton();
		} else {
			document.getElementById("alert-gold2").style.display = "none";
			document.getElementById("alert-gold2").innerHTML = "";
			enableButton();
		}
	};
}

function Ongold2keyUp() {
	let status = document.getElementById("gold2").value;
	let donationROI = parseInt(status) * 4.5;
	document.getElementById("gold2-profit").innerHTML =
		"Compound Profit $" + donationROI + " in 10days";
}

// End of Gold plan investment function

// Premium plan investment function

function premiumplan() {
	function disableButton() {
		document.getElementById("premium__btn").disabled = true;
	}

	function enableButton() {
		document.getElementById("premium__btn").disabled = false;
	}

	document.getElementById("premium").onblur = function () {
		let status = document.getElementById("premium").value;

		if (status < 10001 || status > 50000) {
			document.getElementById("alert-premium").style.display = "block";
			document.getElementById("alert-premium").innerHTML =
				"Input amount between MIN $10,001 - MAX $50,000";
			disableButton();
		} else {
			document.getElementById("alert-premium").style.display = "none";
			document.getElementById("alert-premium").innerHTML = "";
			enableButton();
		}
	};
}

function OnpremiumkeyUp() {
	let status = document.getElementById("premium").value;
	let donationROI = parseInt(status) * 3.5;
	document.getElementById("premium-profit").innerHTML =
		"Compound Profit $" + donationROI + " in 10days";
}

// End of Premium plan investment function

// Basic plan investment function

function basicplan() {
	function disableButton() {
		document.getElementById("basic__btn").disabled = true;
	}

	function enableButton() {
		document.getElementById("basic__btn").disabled = false;
	}

	document.getElementById("basic").onblur = function () {
		let status = document.getElementById("basic").value;

		if (status < 5001 || status > 10000) {
			document.getElementById("alert-basic").style.display = "block";
			document.getElementById("alert-basic").innerHTML =
				"Input amount between MIN $5,001 - MAX $10,000";
			disableButton();
		} else {
			document.getElementById("alert-basic").style.display = "none";
			document.getElementById("alert-basic").innerHTML = "";
			enableButton();
		}
	};
}

function OnbasickeyUp() {
	let status = document.getElementById("basic").value;
	let donationROI = parseInt(status) * 3;
	document.getElementById("basic-profit").innerHTML =
		"Compound Profit $" + donationROI + " in 10days";
}

// End of Basic plan investment function

// Starter plan investment function

function starterplan() {
	function disableButton() {
		document.getElementById("starter__btn").disabled = true;
	}

	function enableButton() {
		document.getElementById("starter__btn").disabled = false;
	}

	document.getElementById("starter").onblur = function () {
		let status = document.getElementById("starter").value;

		if (status < 500 || status > 5000) {
			document.getElementById("alert-starter").style.display = "block";
			document.getElementById("alert-starter").innerHTML =
				"Input amount between MIN $500 - MAX $5000";
			disableButton();
		} else {
			document.getElementById("alert-starter").style.display = "none";
			document.getElementById("alert-starter").innerHTML = "";
			enableButton();
		}
	};
}

function OnstarterkeyUp() {
	let status = document.getElementById("starter").value;
	let donationROI = parseInt(status) * 2.5;
	document.getElementById("starter-profit").innerHTML =
		"Compound Profit $" + donationROI + " in 10days";
}

// End of Starter plan investment function
