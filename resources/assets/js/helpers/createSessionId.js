import { v4 as uuidv4 } from "uuid";
import moment from "moment/moment";

export function createSessionId() {
    let sessionId;
    if (!localStorage.getItem("session")) {
        sessionId = uuidv4();
        localStorage.setItem("session", sessionId);
    } else {
        const now = moment().utc().format("YYYY-MM-DD HH:mm:ss.SSSSSSZ");
        const expiration = localStorage.getItem("expiration");
        if (now >= expiration) {
            sessionId = uuidv4();
            localStorage.setItem("session", sessionId);
        }
    }
}
//440-expired id
//400-not created
//304-not upd (stable conection)
//401 -Unauthorized
export async function apiConection() {
    const urlCreateApiConection =
        "https://api.mintyliving.com/v1/minty/session";
    const config = {
        headers: {
            Authorization:
                "Bearer prod_L2Y8ZdwzJGMkkpLHPY3XflJcJXqCQbBGBwfLVsWfMm31YPCNbyc0Q7O",
            MintySessionId: localStorage.getItem("session") || "",
        },
    };

    const response = await axios.post(urlCreateApiConection, {}, config);
    const expirationDate = response.data.data.expirationDate;
    localStorage.setItem("expiration", expirationDate);
}
