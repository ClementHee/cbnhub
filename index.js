import express from "express";
import cors from "cors";
import supertokens from "supertokens-node";
import { middleware, errorHandler } from "supertokens-node/framework/express";
import Session from "supertokens-node/recipe/session";
import EmailPassword from "supertokens-node/recipe/emailpassword";
import { getAllCORSHeaders } from "supertokens-node";

supertokens.init({
    framework: "express",
    supertokens: {
        connectionURI: "http://localhost:3567",
        apiKey: "nKx8Hgs2lI7n7g0kFz9H2z0nxVvR5pNJ58hW8A1zds8=",
    },
    appInfo: {
        appName: "MyApp",
        apiDomain: "http://localhost:3001", // ⬅️ Changed to HTTP
        websiteDomain: "http://cbnhub.test", // ⬅️ Changed to HTTP if needed
    },
    recipeList: [
        EmailPassword.init({
            signUpFeature: {
                formFields: [
                    {
                        id: "username",
                        validate: async (value) => {
                            if (value.trim() === "") return "Name is required";
                            return undefined;
                        },
                    },
                ],
            },
        }),
        Session.init({
            cookieSecure: false, // ⬅️ Must be false for HTTP
        }),
    ],
});

const app = express();

app.set("trust proxy", 1);

app.use(cors({
    origin: "http://cbnhub.test",
    credentials: true,
    allowedHeaders: ["content-type", ...getAllCORSHeaders()],
}));

app.use(middleware());

app.get("/sessioninfo", async (req, res) => {
    let session = await Session.getSession(req, res);
    res.json({ userId: session.getUserId() });
});

app.get("/check-routes", (req, res) => {
    res.send(app._router.stack
        .filter(r => r.route)
        .map(r => r.route.path)
    );
});

app.use(errorHandler());

// 🔓 HTTP only server
app.listen(3001, () => {
    console.log("SuperTokens backend running at http://localhost:3001");
});